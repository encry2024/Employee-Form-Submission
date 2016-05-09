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
}
