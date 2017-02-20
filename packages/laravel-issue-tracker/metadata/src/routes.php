<?php

Route::group(['prefix' => 'api/v1', 'middleware' => 'auth:api'], function() {

    Route::resource('metadata', '\LaravelIssueTracker\Metadata\Controllers\MetadataController');

});