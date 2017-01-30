<?php

Route::group(['prefix' => 'api/v1'], function() {

    Route::resource('fileattachment', '\LaravelIssueTracker\Fileattachment\Controllers\FileattachmentController');

});