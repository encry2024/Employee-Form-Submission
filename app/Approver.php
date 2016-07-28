<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Approver extends Model
{
    //
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function approver_campaigns()
    {
        return $this->hasMany(ApproverCampaign::class);
    }

    public function approver_forms()
    {
        return $this->hasMany(ApproverForm::class);
    }

    public static function changeApproverRank($request, $approver)
    {
        $approver = Approver::find($approver->id);
        $user = User::find($approver->user_id);

        $approver_campaign = ApproverCampaign::whereApproverId($approver->id)->update(['rank' => $request->get('rank')]);
        $getRank = ApproverCampaign::whereApproverId($approver->id)->first();

        return redirect()->back()->with('message', "$user->name's rank was changed to $getRank->rank");
    }
}
