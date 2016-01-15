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

	Route::group(['middleware' => ['auth']], function () {    
    	Route::controller('/home', 'HomeController');
    	Route::controller('/users', 'UsersController');
    	Route::controller('/groups', 'GroupsController');

    	/*
		** Front End Dashboard Route
    	*/
    	Route::controller('/dashboard', 'DashboardController');
	});
});

Route::controller('/','FrontendController');
Route::get('/error', function () {
    return view('errors.404');
});
