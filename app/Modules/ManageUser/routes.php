<?php

Route::group(array('middleware' => ['web', 'auth'], 'module' => 'ManageUser', 'namespace' => 'App\Modules\ManageUser\Controllers'), function() {

    Route::resource('ManageUser', 'ManageUserController');
    
});	