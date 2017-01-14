<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::group(['prefix' => 'api/v1/authentication'], function() {
    Route::post('database/login', '\LaravelIssueTracker\Authentication\Controllers\DatabaseAuthController@login');
    Route::get('github/login', '\LaravelIssueTracker\Authentication\Controllers\GithubAuthController@login');
    Route::get('facebook/login', '\LaravelIssueTracker\Authentication\Controllers\FacebookAuthController@login');
    Route::get('bitbucket/login', '\LaravelIssueTracker\Authentication\Controllers\BitbucketAuthController@login');
    Route::get('google/login', '\LaravelIssueTracker\Authentication\Controllers\GoogleAuthController@login');
});
