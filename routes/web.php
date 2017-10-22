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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('users')->middleware('auth')->group(function() {
	
	Route::get('/','UserController@index');
	
	Route::get('create','UserController@create');
	Route::post('create','UserController@store');

	Route::get('edit/{user}','UserController@edit');
	Route::post('edit/{user}','UserController@update');

	Route::post('delete/{user}','UserController@delete');

	// Role Management
	Route::prefix('roles')->group(function() {
		Route::get('/','RoleController@index');
	});
});
