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

Route::get('/', 'DashboardController@index');

Route::group(['middleware' => ['web']], function () {

    Route::get('login', 'LoginController@index');
    Route::get('logout', 'LoginController@logout');

    Route::post('authenticate', 'LoginController@authenticate');

});

Route::group(['middleware' => ['web', 'auth']], function () {

    Route::resource('user', 'UserController');

});