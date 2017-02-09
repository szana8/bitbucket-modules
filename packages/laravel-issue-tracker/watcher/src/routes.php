<?php

Route::group(['prefix' => 'api/v1'], function() {

    Route::resource('watcher', '\LaravelIssueTracker\Watcher\Controllers\WatcherController');

});