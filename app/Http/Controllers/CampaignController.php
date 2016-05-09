<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Campaign;
use App\Http\Requests\StoreCampaignRequest;

class CampaignController extends Controller
{

    /**
     * CampaignController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = User::whereType('user')->get();
        $campaigns = Campaign::all();

        return view('campaigns.index', compact('users', 'campaigns'));
    }

    public function create()
    {
        $users = User::whereType('user')->get();
        $campaigns = Campaign::all();

        return view('campaigns.create', compact('users', 'campaigns'));
    }

    public function postCampaign(StoreCampaignRequest $data)
    {
        $post_campaign = Campaign::postCampaign($data);

        return $post_campaign;
    }
}
