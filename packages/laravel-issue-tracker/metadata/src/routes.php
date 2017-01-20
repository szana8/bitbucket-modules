<?php

Route::group(['prefix' => 'api/v1'], function() {
    Route::resource('metadata', '\LaravelIssueTracker\Metadata\Controllers\MetadataController');
});