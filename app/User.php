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

    public function form_users()
    {
        return $this->belongsToMany(Form::class, FormUser::class, 'form_id', 'id');
    }

    public function approver_user()
    {
        return $this->hasMany(Approver::class);
    }

    public static function createUserAccount($request, $data)
    {
        $new_user = new User();
        $new_user->name = $data->get('name');
        $new_user->email = $data->get('email');
        $new_user->password = bcrypt($data->get('password'));
        $new_user->employee_id = $data->get('employee_id');
        $new_user->type = 'user';
        $new_user->position = $request->get('position');
        $new_user->save();

        $user_setting = new UserSetting();
        $user_setting->user_id = $new_user->id;
        $user_setting->vacation_leave = $request->get('vacation_leave');
        $user_setting->sick_leave = $request->get('sick_leave');
        $user_setting->save();

        return redirect()->back()->with('message', 'Employee [ '. $new_user->name .' ] was successfully registered');
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
            'sick_leave' => $request->get('sick_leave')
        ]);

        return redirect()->back();
    }

    public static function getUsers($department_id, $user)
    {
        /*$users = Approver::with(['user'])->get();
        dd($users);*/

        $array = [];
        $user_approvers = Approver::with(['user' => function($query) use($user, $department_id) {
            $query->where('name', 'LIKE', '%'.$user.'%')->where('campaign_id', $department_id)->get();
        }])->get();
        
        $icon = "";

        foreach($user_approvers as $user_approver) {

            if($user_approver->user->type == 'admin') {
                $icon = '<i class="fa fa-star pull-right" aria-hidden="true"></i>
                         <i class="fa fa-user-secret pull-right" aria-hidden="true"></i>';
            } elseif($user_approver->user->type == 'user') {
                $icon = '<i class="fa fa-user pull-right" aria-hidden="true"></i>';
            }

            $array[] = [
                'id'   => $user_approver->id,
                'user_id' => $user_approver->user->id,
                'name' => $user_approver->user->name,
                'role' => ucfirst($user_approver->user->position),
                'icon' => $icon
            ];
        }

        return $array;
    }
}
