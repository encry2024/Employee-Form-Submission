<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Leave extends Model
{
    //
    protected $fillable = ['status'];

    public function form_user()
    {
        return $this->belongsTo(FormUser::class, 'form_user_id');
    }

    public static function showPendingLeave($leave)
    {
        $form_user = FormUser::find($leave->form_user_id);
        $user = User::find($form_user->user_id);
        $campaign_id = $user->campaign_id;
        $approver_id = Auth::user()->approver->id;


        $approverForm = ApproverForm::with(['approver.user'])->whereFormUserId($leave->form_user_id)->whereApproverId($approver_id)->first();
        $approver_list = ApproverForm::with(['approver.user'])->whereFormUserId($leave->form_user_id)->get();

        return view('forms.approver.leave', compact('approver', 'approverForm', 'leave', 'form_user', 'approver_list'));
    }

    public static function approveLeaveForm($request_approve_submitted_form)
    {
        $approver_id = Auth::user()->approver->id;

        // Update current Approver
        $approver_form = ApproverForm::where('approver_id', $approver_id)->where('form_user_id', $request_approve_submitted_form->get('form_user_id'))->first();

        // Get the next ApproverForm approver
        $approverCampaign = ApproverCampaign::with(['approver.user'])->whereCampaignId($approver_form->form_user->user->campaign_id)->where('approver_id', '>=', $approver_id)->orderBy('id','asc')->first();

        $approver_form->update([
            'status' => 'APPROVED',
            'active' => 0
        ]);

        if(count($approverCampaign) != 0) {
            $update_next_approver_form = ApproverForm::where('approver_id', $approverCampaign->id)->where('form_user_id', $request_approve_submitted_form->get('form_user_id'))->first();

            $update_next_approver_form->update([
                'active' => 1
            ]);
        }

        return redirect()->back()->with('message', 'You have successfully approved the submitted Leave Form');
    }

    public static function adminApproveLeaveForm($leave)
    {
        $leave->update([
            'status' => 'APPROVED'
        ]);

        return redirect()->back()->with('message', 'You have successfully approved the submitted Leave Form');
    }

    public static function postLeave($requestSubmitLeaveByApprover)
    {
        $campaign_id = Auth::user()->campaign_id;
        $approver_campaigns = ApproverCampaign::whereCampaignId($campaign_id)->orderBy('rank', 'ASC')->get();

        // dd($approver_campaigns);

        $form_user = new FormUser();
        $form_user->form_id = $request->get('form_id');
        $form_user->user_id = $request->get('user_id');

        if($form_user->save()) {
            $leave_form = new Leave();
            $leave_form->form_user_id = $form_user->id;
            $leave_form->start_date = date('Y-m-d', strtotime($request->get('start')));
            $leave_form->end_date = date('Y-m-d', strtotime($request->get('end')));
            $leave_form->reason = $request->get('leave_reason');
            $leave_form->leave_purpose = $request->get('leave_option');
            $leave_form->status = 'PENDING';

            if($leave_form->save()) {
                foreach($approver_campaigns as $key=>$approver_campaign) {
                    if($key == 0) {
                        $approver_form = new ApproverForm();
                        $approver_form->approver_id = $approver_campaign->approver_id;
                        $approver_form->form_user_id = $form_user->id;
                        $approver_form->status = 'PENDING';
                        $approver_form->active = 1;
                        $approver_form->save();
                    } else {
                        $approver_form = new ApproverForm();
                        $approver_form->approver_id = $approver_campaign->approver_id;
                        $approver_form->form_user_id = $form_user->id;
                        $approver_form->status = 'PENDING';
                        $approver_form->save();
                    }
                }
            }
        }

        return redirect()->back()->with('message', 'Leave form was successfully submitted');
    }
}
