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

    /* Admin Group */
    Route::group(['prefix' => 'admin', 'middleware' => 'check_if_admin'], function() {
        Route::get('/dashboard', 'HomeController@index')->name('home');

        /* Users */
        Route::get('/users', 'UserController@index')->name('users');
        Route::get('/user/create', 'UserController@create')->name('create_user');
        Route::post('/user/create' ,'UserController@postUser')->name('post_user');

        /* Departments */
        Route::get('/departments', 'CampaignController@index')->name('campaigns');
        Route::get('/departments/create', 'CampaignController@create')->name('create_campaign');
        Route::post('/departments/create', 'CampaignController@postCampaign')->name('post_campaign');

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
    });
});

