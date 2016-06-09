<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ApproverCampaign extends Model
{
    protected $table = 'approver_campaign';
    //
    public function approver()
    {
        return $this->belongsTo(Approver::class);
    }

    public function campaign()
    {
        return $this->belongsTo(Campaign::class);
    }
}
