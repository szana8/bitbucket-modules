<?php

Route::group(array('module'=> 'Dashboard', 'middleware' => ['web', 'auth'], 'namespace' => 'LaravelIssueModules\Dashboard\Controllers'), function () {

    Route::get('/', 'DashboardController@index');

});


