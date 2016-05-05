<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Http\Requests\StoreUserRequest;

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

        return view('users.index', compact('users'));
    }

    public function create()
    {
        $users = User::whereType('user')->get();

        return view('users.create', compact('users'));
    }

    public function postCreate(StoreUserRequest $data)
    {
        $post_create = User::createUserAccount($data);

        return $post_create;
    }
}
