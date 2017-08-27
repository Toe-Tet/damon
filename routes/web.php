<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/','HomeController@index')->name('home');
Route::get('/test', 'ToetetController@index');

Route::group(['prefix' => 'blog'], function() {
	Route::resource('users', 'UserController');
	Route::get('user/data','UserController@data')->name('user.data');
	Route::resource('roles','RoleController');
	Route::get('role/data', 'RoleController@data')->name('role.data');
	Route::resource('posts', 'PostController');
	Route::get('post/data', 'PostController@data')->name('post.data');
	Route::resource('images', 'ImageController');
	Route::resource('emails', 'EmailController');
	Route::get('email/send', 'EmailController@send')->name('email.send');
	Route::resource('calanders', 'CalanderController');
});

