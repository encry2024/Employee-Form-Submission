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

    public static function postCampaign($data)
    {
        $new_campaign = new Campaign();
        $new_campaign->name = $data->get('name');
        $new_campaign->save();

        return redirect()->back()->with('message', 'Campaign ' . $new_campaign->name . ' was successfully added to the campaign list');
    }

    public static function postApprover($request)
    {
        $employee_ids = $request->get('approver');
        $employee_ids = explode(',', $employee_ids);

        foreach($employee_ids as $employee_id) {
            $approver_campaign = new ApproverCampaign();
            $approver_campaign->approver_id = $employee_id;
            $approver_campaign->department_id = $request->get('department_id');
            $approver_campaign->save();
        }
    }
}
