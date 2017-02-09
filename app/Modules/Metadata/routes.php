<?php

Route::group(array('middleware' => ['web', 'auth'], 'module' => 'Metadata', 'namespace' => 'App\Modules\Metadata\Controllers'), function() {

    Route::resource('Metadata', 'MetadataController');
    
});	