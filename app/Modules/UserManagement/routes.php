<?php

Route::group(array('middleware' => ['web', 'auth'], 'module' => 'UserManagement', 'namespace' => 'App\Modules\UserManagement\Controllers'), function() {

    Route::resource('UserManagement', 'UserManagementController');
    
});	