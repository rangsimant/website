<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
Route::group(array('before' => 'auth'), function()
{
	Route::group(array('before' => 'manage_page'), function()
	{
		Route::get('admin/client/create', 'UsersController@create');
		Route::get('admin/client/{id}/edit', 'UsersController@edit');

		Route::controller('admin','AdminController');
	});
	Route::post('newAccount','AccountController@postNewAccountFacebook');

	Route::get('/','HomeController@all');
	Route::get('facebook','HomeController@all');
	Route::get('instagram','HomeController@all');

	Route::post('getImage','HomeController@getAll');
	Route::post('getPageList','AccountController@getPageList');
});
//

// Confide routes
// Route::get('users/create', 'UsersController@create');
Route::post('users', 'UsersController@store');
Route::post('users/update', 'UsersController@update');
Route::get('users/login', 'UsersController@login');
Route::post('users/login', 'UsersController@doLogin');
Route::get('users/confirm/{code}', 'UsersController@confirm');
Route::get('users/forgot_password', 'UsersController@forgotPassword');
Route::post('users/forgot_password', 'UsersController@doForgotPassword');
Route::get('users/reset_password/{token}', 'UsersController@resetPassword');
Route::post('users/reset_password', 'UsersController@doResetPassword');
Route::get('users/logout', 'UsersController@logout');
