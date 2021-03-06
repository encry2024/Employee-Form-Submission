<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Form;
use App\ApproverForm;
use DB;
use App\Leave;

class FormController extends Controller
{

    /**
     * FormController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function viewLeave()
    {
        return view('forms.leave');
    }

    public function postLeaveForm(Request $request)
    {
        $postLeaveForm = Form::post_leave_form($request);

        return $postLeaveForm;
    }

    public function leaveForm(Leave $leave)
    {
        $approver_form = ApproverForm::with(['approver.user'])->whereFormUserId($leave->form_user_id)->get();

        return view('forms.show', compact('approver_form', 'leave'));
    }

    public function showChangeSchedule()
    {
        return 'test show change schedule';
    }

    public function showOvertime()
    {
        return 'test show overtime';
    }

    public function show(ApproverForm $approver_form)
    {
    }
}
