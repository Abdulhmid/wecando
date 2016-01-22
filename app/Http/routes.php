<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    Route::auth();

    Route::controller('/dashboard', 'DashboardController');
    
    Route::group(['middleware' => ['auth']], function () {    
        Route::controller('/home', 'HomeController');
        Route::controller('/users', 'UsersController');
        Route::controller('/groups', 'GroupsController');
        Route::controller('/partners', 'PartnersController');
        Route::controller('/back-newsletter', 'NewsletterController');
        Route::controller('/back-campaign', 'BackCampaignController');
        Route::controller('/configuration', 'ConfigurationController');

        /*
        ** Front End Dashboard Route
        */
    });
    
    Route::get('auth/facebook', 'Auth\AuthController@redirectToProvider');
    Route::get('auth/facebook/callback', 'Auth\AuthController@handleProviderCallback');
    Route::controller('/','FrontendController');
});


Route::get('/error', function () {
    return view('errors.404');
});
