<?php

Route::get('/', function () {
    if(Auth::guard()->guest()) {
        return redirect()->to('login');
    } else {
        return redirect()->to(Auth::user()->type . '/dashboard');
    }
});

Route::group(['middleware' => 'web'], function () {
    Route::auth();

    /* JSON */
    Route::get('department/{department_id}/get_users/{user}', 'UserController@getUsers');

    /* Admin Group */
    Route::group(['prefix' => 'admin', 'middleware' => 'check_if_admin'], function() {
        Route::get('/dashboard', 'HomeController@index')->name('home');

        /* Users */
        Route::get('/users', 'UserController@index')->name('users');
        Route::get('/user/create', 'UserController@create')->name('create_user');
        Route::post('/user/create' ,'UserController@postUser')->name('post_user');
        Route::get('/user/{user}', 'UserController@showUser')->name('show_user');

        /* Departments */
        Route::get('/departments', 'CampaignController@index')->name('campaigns');
        Route::get('/departments/create', 'CampaignController@create')->name('create_campaign');
        Route::post('/departments/create', 'CampaignController@postCampaign')->name('post_campaign');
        Route::get('/department/{department}', 'CampaignController@show')->name('show_campaign');

        /* Approver */
        Route::post('/appoint_approver', 'CampaignController@postApprover')->name('post_approver');

        /* Forms */
        Route::get('/leave/{leave}', 'FormController@showLeave')->name('show_leave');
    });

    /* User Group */
    Route::group(['prefix' => 'user'], function() {

        /* Dashboard */
        Route::get('/dashboard', 'HomeController@userIndex')->name('user_home');

        /* Profile */
        Route::get('/profile', 'UserController@userProfile')->name('user_profile');
        Route::get('/edit/profile', 'UserController@editUserProfile')->name('edit_user_profile');
        Route::post('/edit/profile', 'UserController@postEditUserProfile')->name('post_update_user');

        /* Forms */
        Route::get('/leave_form', 'FormController@leaveForm')->name('leave_form');
        Route::post('/leave_form', 'FormController@postLeaveForm')->name('post_leave_form');
        Route::get('submitted/leave', 'FormController@viewLeave')->name('leave');
        Route::get('submitted/change_schedule', 'FormController@viewChangeSchedule')->name('change_schedule');
        Route::get('submitted/overtime', 'FormController@viewOvertime')->name('overtime');
    });

    /* Approver Group */
    Route::group(['prefix' => 'approver', 'middleware' => 'check_if_approver'], function() {
        Route::get('/dashboard', 'HomeController@approverIndex')->name('approver_home');
    });
});

