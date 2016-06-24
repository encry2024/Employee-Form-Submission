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

    public function campaigns()
    {
        return $this->hasMany(Campaign::class);
    }

    public function approver_forms()
    {
        return $this->hasMany(ApproverForm::class);
    }
}
