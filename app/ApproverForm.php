<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ApproverForm extends Model
{
    //
    protected $table = 'approver_form';

    public function approver()
    {
        return $this->belongsTo(Approver::class);
    }

    public function form_user()
    {
        return $this->belongsTo(FormUser::class);
    }
}
