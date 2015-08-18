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

Route::get('/', function()
{
	return redirect('auth/login');
});

Route::get('home', 'HomeController@index');

Route::get('social', 'SocialController@index');
Route::get('social/facebook', 'SocialController@facebook');
Route::get('social/pageFacebook', 'SocialController@pageFacebook');
Route::get('social/facebook/reload', 'SocialController@reloadPageFacebook');
Route::get('announce', 'AnnounceController@index');
Route::get('social/authfacebook', 'SocialController@authFacebook');


Route::post('page/status', 'FacebookPageController@changeStatus');
Route::post('social/remove', 'SocialController@remove');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

/*FOR ANGULAR JS*/
Route::get('pagelist', 'AnnounceController@getPageList');
