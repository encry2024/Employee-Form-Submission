<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    //
    public static function post_leave_form($request)
    {
        $form_user = new FormUser();
        $form_user->form_id = $request->get('form_id');
        $form_user->user_id = $request->get('user_id');
        $form_user->save();

        $leave_form = new Leave();
        $leave_form->form_user_id = $form_user->id;
        $leave_form->start_date = $request->get('start');
        $leave_form->end_date = $request->get('end');
        $leave_form->leave_reason = $request->get('leave_reason');
        $leave_form->leave_purpose = $request->get('leave_option');
        $leave_form->save();

        return redirect()->back();
    }
}
