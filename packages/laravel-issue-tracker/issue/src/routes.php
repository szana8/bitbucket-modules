<?php

Route::group(['prefix' => 'api/v1'], function() {

Route::resource('issue', '\LaravelIssueTracker\Issue\Controllers\IssueController');

});