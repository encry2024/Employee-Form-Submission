<?php

Route::get('/', function () {
    if(Auth::guard()->guest()) {
        return redirect()->to('login');
    } else {
        return redirect()->to(Auth::user()->type . '/dashboard');
    }
});

Route::auth();

# JSON
Route::get('department/{department_id}/get_users/{user}', 'UserController@getUsers');

# ADMIN GROUP
Route::group(['middleware' => ['check_if_admin']], function() {
    Route::group(['prefix' => 'admin'], function() {
        Route::get('/dashboard', 'HomeController@index')->name('home');

        /* Users */
        Route::get('/users', 'UserController@index')->name('users');
        Route::get('/user/create', 'UserController@create')->name('create_user');
        Route::post('/user/create' ,'UserController@postUser')->name('post_user');
        Route::get('/user/{user}', 'UserController@showUser')->name('show_user');
        Route::get('/user/edit/{user}', 'UserController@editUser')->name('edit_user');
        Route::get('user/approver/{user}', 'UserController@showApproverProfile')->name('show_approver_profile');
        Route::get('user/agent/{user}', 'UserController@showAgentProfile')->name('show_agent_profile');

        /* Departments */
        Route::get('/departments', 'CampaignController@index')->name('campaigns');
        Route::get('/departments/create', 'CampaignController@create')->name('create_campaign');
        Route::post('/departments/create', 'CampaignController@postCampaign')->name('post_campaign');
        Route::get('/department/{department}', 'CampaignController@show')->name('show_campaign');
        Route::get('/{department}/add_employee', 'CampaignController@addEmployee')->name('add_employee');
        Route::post('/{department}/add_user/', 'CampaignController@postAddUser')->name('post_add_user');

        /* Approver */
        Route::post('/appoint_approver', 'CampaignController@postApprover')->name('post_approver');
        Route::patch('/update/approver/{approver}/update_rank', 'ApproverController@postUpdateRank')->name('update_approver_rank');

        /* Forms */
        Route::get('/leave/{leave}', 'FormController@leaveForm')->name('show_leave');

        /* Approve */
        Route::patch('/approve/form/{leave}', 'LeaveController@adminApproveForm')->name('updateApproverStatus');
    });
});

# AGENT GROUP
Route::group(['prefix' => 'agent'], function() {
    /* Dashboard */
    Route::get('/dashboard', 'HomeController@userIndex')->name('user_home');

    /* Profile */
    Route::get('/profile', 'UserController@userProfile')->name('user_profile');
    Route::get('/edit/profile', 'UserController@editUserProfile')->name('edit_user_profile');
    Route::post('/edit/profile', 'UserController@postEditUserProfile')->name('post_update_user');

    /* Forms */
    Route::get('/leave_form', 'FormController@viewLeave')->name('leave_form');
    Route::post('/leave_form', 'FormController@postLeaveForm')->name('post_leave_form');
    Route::get('submitted/leave', 'FormController@viewLeave')->name('leave');
    Route::get('submitted/change_schedule', 'FormController@viewChangeSchedule')->name('change_schedule');
    Route::get('submitted/overtime', 'FormController@viewOvertime')->name('overtime');
});

# APPROVER GROUP
Route::group(['prefix' => 'approver', 'middleware' => ['check_if_approver']], function() {
    Route::get('/dashboard', 'HomeController@approverIndex')->name('approver_home');
    Route::get('/profile', 'UserController@approverProfile')->name('approver_profile');
    Route::patch('/update', 'UserController@updateApprover')->name('update_approver_info');

    /* Leave form */
    Route::get('/leave/{leave}', 'LeaveController@showApproverLeave')->name('approver_show_leave');
    Route::patch('/approve/leave', 'LeaveController@approveLeaveForm')->name('approve_leave');
});

