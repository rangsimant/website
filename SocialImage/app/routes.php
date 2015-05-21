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
Route::controller('admin','AdminController');

Route::get('/','HomeController@all');
Route::get('facebook','HomeController@all');
Route::get('instagram','HomeController@all');

Route::post('getImage','HomeController@getAll');
Route::post('getPageList','AccountController@getPageList');
