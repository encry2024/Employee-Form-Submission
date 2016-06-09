<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FormUser extends Model
{
    //
    protected $table = 'form_user';

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function form()
    {
        return $this->belongsTo(Form::class);
    }
}
