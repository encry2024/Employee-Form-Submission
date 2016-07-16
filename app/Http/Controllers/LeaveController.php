<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Leave;
use App\ApproverForm;
use App\ApproverCampaign;
use Illuminate\Support\Facades\DB;

class LeaveController extends Controller
{
    //
    public function showApproverLeave(Leave $leave)
    {
        $show_pending_leave = Leave::showPendingLeave($leave);

        return $show_pending_leave;
    }
}
