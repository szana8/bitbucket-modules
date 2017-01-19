<?php

Route::group(array('module'=> 'Login', 'middleware' => ['web'], 'namespace' => 'LaravelIssueModules\Login\Controllers'), function () {

    Route::get('login', 'LoginController@index');
    Route::post('login', 'LoginController@login');
    Route::get('logout', 'LoginController@logout');

});