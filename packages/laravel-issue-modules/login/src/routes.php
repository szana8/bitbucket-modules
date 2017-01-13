<?php

Route::group(array('module'=> 'Login', 'namespace' => 'LaravelIssueModules\Login\Controllers'), function () {

    Route::get('login', 'LoginController@index');

});