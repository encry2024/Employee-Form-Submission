<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
    //
    public function form_user()
    {
        return $this->belongsTo(FormUser::class, 'form_user_id');
    }
}
