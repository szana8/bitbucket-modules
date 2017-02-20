<?php

Route::group(['prefix' => 'api/v1', 'middleware' => 'auth:api'], function() {
    Route::resource('ListOfValues', '\LaravelIssueTracker\ListOfValues\Controllers\ListOfValuesController');
});