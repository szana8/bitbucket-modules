<?php

Route::group(array('module'=> 'Dashboard', 'middleware' => ['web'], 'namespace' => 'LaravelIssueModules\Dashboard\Controllers'), function () {

    dd( (Auth::check() == 1) );
    Route::get('/', 'DashboardController@index');

});


