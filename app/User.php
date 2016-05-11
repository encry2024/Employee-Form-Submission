<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Http\Request;
use App\UserSetting;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'campaign_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function campaign()
    {
        return $this->belongsTo(Campaign::class);
    }

    public function user_setting()
    {
        return $this->hasOne(UserSetting::class, 'user_id');
    }

    public static function createUserAccount($data, $request)
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

        $user_setting = new UserSetting();
        $user_setting->user_id = $new_user->id;
        $user_setting->vacation_leave = $request->get('vacation_leave');
        $user_setting->sick_leave = $request->get('sick_leave');
        $user_setting->paternity_leave = $request->get('paternity_leave');
        $user_setting->maternity_leave = $request->get('maternity_leave');
        $user_setting->authorized_absence = $request->get('authorized_absence');
        $user_setting->save();

        return redirect()->back()->with('message', 'Employee '. $new_user->name .'was successfully registered');
    }

    public static function updateUserProfile($request)
    {
        $campaign_id = Campaign::find($request->get('campaign'));

        $user = User::find($request->get('user_id'))->update([
            'email' => $request->get('email'),
            'campaign_id' => $campaign_id->id,
        ]);

        $update_leave_settings = UserSetting::where('user_id', $request->get('user_id'))->update([
            'vacation_leave' => $request->get('vacation_leave'),
            'sick_leave' => $request->get('sick_leave'),
            'paternity_leave' => $request->get('paternity_leave'),
            'maternity_leave' => $request->get('maternity_leave'),
            'authorized_absence' => $request->get('authorized_absence')
        ]);

        return redirect()->back();
    }

    public function getType()
    {
        return $this->type();
    }
}
