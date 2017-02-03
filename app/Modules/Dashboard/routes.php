<?php



Route::group(array('middleware' => ['web', 'auth'], 'module' => 'Dashboard', 'namespace' => 'App\Modules\Dashboard\Controllers'), function() {

    Route::get('/', 'DashboardController@index');
    Route::resource('Dashboard', 'DashboardController');
    
});	