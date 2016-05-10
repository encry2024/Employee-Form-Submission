<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

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

        /* Campaigns */
        Route::get('/campaigns', 'CampaignController@index')->name('campaigns');
        Route::get('/campaigns/create', 'CampaignController@create')->name('create_campaign');
        Route::post('/campaigns/create', 'CampaignController@postCampaign')->name('post_campaign');
    });

    /* User Group */
    Route::group(['prefix' => 'user'], function() {
        /* User Dashboard */
        Route::get('/dashboard', 'HomeController@userIndex')->name('user_home');

        /* User Profile */
        Route::get('/profile', 'UserController@userProfile')->name('user_profile');
        Route::get('/edit/profile', 'UserController@editUserProfile')->name('edit_user_profile');
        Route::post('/edit/profile', 'UserController@postEditUserProfile')->name('post_update_user');
    });
});

