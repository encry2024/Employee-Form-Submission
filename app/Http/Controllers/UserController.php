<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Http\Requests\StoreUserRequest;
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

    public function postUser(StoreUserRequest $data)
    {
        $post_create = User::createUserAccount($data);

        return $post_create;
    }
}
