<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Leave extends Model
{
    //
    public function form_user()
    {
        return $this->belongsTo(FormUser::class, 'form_user_id');
    }

    public static function showPendingLeave($leave)
    {
        $approver = Approver::find(Auth::user()->id);
        $approverForm = ApproverForm::whereFormUserId($leave->form_user_id)->whereApproverId($approver->id)->first();

        return view('forms.approver.leave', compact('approver', 'approverForm', 'leave'));
    }
}
