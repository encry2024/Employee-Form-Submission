<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ApproverForm extends Model
{
    //
    protected $fillable = ['status', 'active'];
    protected $table = 'approver_form';

    public function approver()
    {
        return $this->belongsTo(Approver::class, 'approver_id');
    }

    public function form_user()
    {
        return $this->belongsTo(FormUser::class, 'form_user_id');
    }

    public function approver_campaigns()
    {
        return $this->hasMany(ApproverCampaign::class);
    }
}
