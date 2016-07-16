<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Approver;

class ApproverController extends Controller
{
    //
    public function postUpdateRank(Request $request, Approver $approver)
    {
        $post_change_rank = Approver::changeApproverRank($request, $approver);

        return $post_change_rank;
    }
}
