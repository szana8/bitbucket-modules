<?php

Route::group(array('module'=> 'Dashboard', 'namespace' => 'LaravelIssueModules\Dashboard\Controllers'), function () {

    Route::get('/', 'DashboardController@index');

});


