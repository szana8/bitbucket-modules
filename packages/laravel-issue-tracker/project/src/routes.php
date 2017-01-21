<?php

Route::group(['prefix' => 'api/v1'], function() {

    Route::resource('project', '\LaravelIssueTracker\Project\Controllers\ProjectController');

});