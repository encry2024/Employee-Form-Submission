<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Form;

class FormController extends Controller
{

    /**
     * FormController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function leaveForm()
    {
        return view('forms.leave');
    }
}
