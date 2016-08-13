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
        $approverCampaign = ApproverCampaign::with(['approver.user'])->whereCampaignId($approver_form->form_user->user->campaign_id)->where('approver_id', '>', $approver_id)->orderBy('id','asc')->first();

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
}
