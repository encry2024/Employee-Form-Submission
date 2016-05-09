<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Http\Request;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public static function createUserAccount($data)
    {
        $new_user = new User();
        $new_user->name = $data->get('name');
        $new_user->email = $data->get('email');
        $new_user->password = bcrypt($data->get('password'));
        $new_user->employee_id = $data->get('employee_id');
        $new_user->type = 'user';
        $new_user->campaign_id = $data->get('campaign_id');
        $new_user->rank = $data->get('rank');
        $new_user->save();

        return redirect()->back()->with('message', 'Employee '. $new_user->name .'was successfully registered');
    }

    public function getType()
    {
        return $this->type();
    }
}
