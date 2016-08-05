<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Form extends Model
{
    //

    public function approvers()
    {
        return $this->belongsToMany(Approver::class);
    }

    public static function post_leave_form($request)
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
