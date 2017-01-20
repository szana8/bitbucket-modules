<?php

Route::group(['prefix' => 'api/v1'], function() {
    Route::resource('ListOfValues', '\LaravelIssueTracker\ListOfValues\Controllers\ListOfValuesController');
});