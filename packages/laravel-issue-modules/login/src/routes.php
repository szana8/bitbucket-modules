<?php

Route::group(array('module'=> 'Login', 'namespace' => 'LaravelIssueModules\Login\Controllers'), function () {

    Route::get('login', 'LoginController@index');
    Route::post('login', 'LoginController@login');

});