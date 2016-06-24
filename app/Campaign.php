<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\User;

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
        $approver = new Approver();
        $approver->user_id = $request->get('user_id');
        $approver->save();

        $approver_campaign = new ApproverCampaign();
        $approver_campaign->approver_id = $request->get('user_id');
        $approver_campaign->campaign_id = $request->get('department_id');
        $approver_campaign->rank = $request->get('rank');
            
        if($approver_campaign->save()) {
            $user = User::find($request->get('user_id'));

            if ($user->type == 'user') {
                $user->update(['type' => 'approver', 'campaign_id' => 0]);

                return redirect()->back();
            } else {
                return redirect()->back();
            }
        } else {
            return redirect()->back();
        }

    }
}
