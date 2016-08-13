<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Leave;
use App\ApproverForm;
use App\ApproverCampaign;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\RequestApproveSubmittedForm;

class LeaveController extends Controller
{
    //
    public function showApproverLeave(Leave $leave)
    {
        $show_pending_leave = Leave::showPendingLeave($leave);

        return $show_pending_leave;
    }

    public function approveLeaveForm(RequestApproveSubmittedForm $request_approve_submitted_form)
    {
        $approve_leave = Leave::approveLeaveForm($request_approve_submitted_form);

        return $approve_leave;
    }

    public function adminApproveForm(Leave $leave)
    {
        $approve_leave = Leave::adminApproveLeaveForm($leave);

        return $approve_leave;
    }
}
