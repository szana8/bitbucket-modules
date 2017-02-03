<?php

Route::group(array('module' => 'Login', 'namespace' => 'App\Modules\Login\Controllers'), function() {

    Route::get('login', 'LoginController@index');
    Route::get('logout', 'LoginController@logout');

    Route::post('authenticate', 'LoginController@authenticate');

});