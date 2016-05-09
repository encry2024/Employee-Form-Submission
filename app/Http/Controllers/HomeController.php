<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\User;
use App\Campaign;

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
        $users = User::whereType('user')->get();
        $campaigns = Campaign::all();

        return view('home', compact('users', 'campaigns'));
    }

    public function userIndex()
    {
        return view('auth.user.dashboard');
    }
}
