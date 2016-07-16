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

    public function postUser(Request $request, StoreUserRequest $data)
    {
        $post_create = User::createUserAccount($request, $data);

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

    public function getUsers($department_id, $user)
    {
        $get_users = User::getUsers($department_id, $user);

        return $get_users;
    }

}
