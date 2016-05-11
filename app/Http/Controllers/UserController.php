<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\StoreUserSettingsRequest;
use App\Campaign;


class UserController extends Controller
{
    //

    /**
     * UserController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = User::whereType('user')->get();
        $campaigns = Campaign::all();

        return view('users.index', compact('users', 'campaigns'));
    }

    public function create()
    {
        $users = User::whereType('user')->get();
        $campaigns = Campaign::all();

        return view('users.create', compact('users', 'campaigns'));
    }

    public function postUser(StoreUserRequest $data, StoreUserSettingsRequest $request)
    {
        $post_create = User::createUserAccount($data, $request);

        return $post_create;
    }

    public function userProfile()
    {
        return view('auth.user.profile');
    }

    public function editUserProfile()
    {
        $campaigns = Campaign::all();

        return view('auth.user.edit', compact('campaigns'));
    }

    public function postEditUserProfile(Request $request)
    {
        $update_user_profile = User::updateUserProfile($request);

        return $update_user_profile;
    }
}
