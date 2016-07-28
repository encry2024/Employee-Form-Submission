<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\User;
use DB;

class Campaign extends Model
{
    protected $fillable = ['name', 'type', 'campaign_id'];

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

    public static function addUser($request, $department)
    {
        foreach($request->except('_token') as $user_id) {
            $value = explode('-', $user_id);
            $user = User::findOrFail($value[1]);

            if($user) {
                if($value[0] == "approver") {
                    // Check if the user is already an approver
                    if($user->type == 'approver') {
                        $approver = Approver::findOrFail($user->id);

                        // If approver found
                        if($approver) {
                            $approver_campaign = new ApproverCampaign();
                            $approver_campaign->approver_id = $approver->id;
                            $approver_campaign->campaign_id = $department->id;
                            $approver_campaign->save();
                        }
                    }

                    // If user type is agent/user update type to approver
                    $user->type = 'approver';
                    $user->campaign_id = 0;

                    // Save updated information
                    // Check if successful
                    if($user->save()) {
                        $approver = new Approver();
                        $approver->user_id = $value[1];

                        if ($approver->save()) {
                            $approver_campaign = new ApproverCampaign();
                            $approver_campaign->approver_id = $approver->id;
                            $approver_campaign->campaign_id = $department->id;
                            $approver_campaign->save();
                        }
                    }
                } elseif ($value[0] == 'agent') {
                    $new_user = User::find($value[1]);
                    $new_user->update([
                        'campaign_id' => $department->id,
                        'type' => 'agent'
                    ]);
                }
            }
        }

        return redirect()->back()->with('message', 'Users role was successfully updated.');
    }

    public static function addEmployee($department)
    {
        $approvers = DB::table('users')
            ->select('user_id')
            ->leftJoin('approvers', function($join) {
                $join->on('approvers.user_id', '=', 'users.id');
            })
            ->join('approver_campaign', function($join) use ($department) {
                $join->on('approver_campaign.approver_id', '=', 'approvers.id')
                    ->where('approver_campaign.campaign_id', '=', $department->id);
            })
            ->get();

        $approver_ids = json_decode(json_encode($approvers), true);

        $users = User::whereNotIn('id', $approver_ids)
            ->where('campaign_id', '!=', $department->id)
            ->where('type', '!=', 'admin')->get();


        return view('campaigns.add_user', compact('users', 'department'));
    }
}
