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

        $approver = Approver::whereUserId(Auth::user()->id)->first();
        $approverForm = ApproverForm::with(['approver.user'])->whereFormUserId($leave->form_user_id)->whereApproverId($approver->id)->first();

        $getApprovers = ApproverForm::with(['approver.user'])->whereFormUserId($leave->form_user_id)->get();

        return view('forms.approver.leave', compact('approver', 'approverForm', 'leave', 'form_user', 'getApprovers'));
    }

    public static function approveLeaveForm($request_approve_submitted_form)
    {
        $approver = Approver::whereUserId(Auth::user()->id)->first();

        $approver_form = ApproverForm::where('approver_id', $approver->id)->where('form_user_id', $request_approve_submitted_form->get('form_user_id'))->first();

        $approver_form->update([
            'status' => 'APPROVED'
        ]);

        return redirect()->back()->with('message', 'You have successfully approved the submitted Leave Form');
    }

    public static function adminApproveLeaveForm($request_approve_submitted_form)
    {
        $leave = Leave::whereFormUserId($request_approve_submitted_form->get('form_user_id'));
        $leave->update([
            'status' => 'APPROVED'
        ]);

        return redirect()->back()->with('message', 'You have successfully approved the submitted Leave Form');
    }
}
