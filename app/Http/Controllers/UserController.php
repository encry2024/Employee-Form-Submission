<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequestUpdateApprover;
use Illuminate\Http\Request;

use App\User;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\StoreUserSettingsRequest;
use App\Campaign;
use App\FormUser;
use App\Http\Requests\RequestUpdateApproverInformationByAdmin;


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
        $users = User::where('type', '!=', 'admin')->get();
        $campaigns = Campaign::all();

        return view('users.index', compact('users', 'campaigns'));
    }

    public function create()
    {
        $users = User::all();
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

    public function approverProfile()
    {
        return view('auth.approver.profile');
    }

    public function updateApprover(RequestUpdateApprover $requestUpdateApprover)
    {
        $update_approver = User::updateApprover($requestUpdateApprover);

        return $update_approver;
    }

    # Approver Functions
    public function showApproverProfile(User $user)
    {
        $getSubmittedLeaveCount = FormUser::with(['leave'])->whereUserId($user->id)->get();

        return view('users.approver_profile', compact('user', 'getSubmittedLeaveCount'));
    }

    public function showApproverSubmittedLeaves(User $user)
    {
        $leaves = FormUser::with(['leave'])->whereUserId($user->id)->get();

        return view('users.approver-tabs.leave', compact('user', 'leaves'));
    }

    public function editApprover(User $user)
    {
        return view('users.approver-edit', compact('user'));
    }

    public function postEditApprover(RequestUpdateApproverInformationByAdmin $requestUpdateApproverInformationByAdmin, User $user)
    {
        $user->update([
            'name' => $requestUpdateApproverInformationByAdmin->get('name'),
            'email' => $requestUpdateApproverInformationByAdmin->get('email')
        ]);

        return redirect()->back()->with('message', $user->name . '\'s information was successfully updated');
    }

    # Agent Functions
    public function showAgentProfile(User $user)
    {
        return view('users.agent_profile', compact('user'));
    }

    public function editUser(User $user)
    {
        return 'Edit User';
    }

}
