<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    //

    public function approvers()
    {
        return $this->belongsToMany(Approver::class);
    }

    public static function post_leave_form($request)
    {
        $form_user = new FormUser();
        $form_user->form_id = $request->get('form_id');
        $form_user->user_id = $request->get('user_id');
        $form_user->save();

        $leave_form = new Leave();
        $leave_form->form_user_id = $form_user->id;
        $leave_form->start_date = date('Y-m-d', strtotime($request->get('start')));
        $leave_form->end_date = date('Y-m-d', strtotime($request->get('end')));
        $leave_form->reason = $request->get('leave_reason');
        $leave_form->leave_purpose = $request->get('leave_option');
        $leave_form->status = 'PENDING';
        $leave_form->save();

        $approver_form = new ApproverForm();

        return redirect()->back();
    }
}
