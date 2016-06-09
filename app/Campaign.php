<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    protected $fillable = ['name'];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function approver_campaign()
    {
        return $this->hasMany(ApproverCampaign::class);
    }

    public static function postCampaign($data)
    {
        $new_campaign = new Campaign();
        $new_campaign->name = $data->get('name');
        $new_campaign->save();

        return redirect()->back()->with('message', 'Campaign ' . $new_campaign->name . ' was successfully added to the campaign list');
    }

    public static function postApprover($request)
    {
        /*dd($request->except('_token'));*/

        $approver_campaign = new ApproverCampaign();
        $approver_campaign->approver_id = $request->get('approver');
        $approver_campaign->campaign_id = $request->get('department_id');
        $approver_campaign->rank = $request->get('rank');
        $approver_campaign->save();
    }
}
