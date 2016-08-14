<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Auth;

use App\User;
use App\Campaign;
use App\Form;
use App\ApproverForm;
use App\Leave;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $leaves = Leave::with(['form_user.user'])->whereStatus('PENDING')->get();
        $users = User::where('type', '!=', 'admin')->get();
        $campaigns = Campaign::all();

        // dd($pending_forms);
        return view('home', compact('users', 'campaigns', 'leaves'));
    }

    public function userIndex()
    {
        return view('auth.user.dashboard');
    }

    public function approverIndex()
    {
        $approver_dashboard = User::showApproverDashboard();

        return $approver_dashboard;
    }
}
