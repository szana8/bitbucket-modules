<?php

Route::get('ListOfValues', 'App\Modules\ListOfValues\Controllers\ListOfValuesController@index')->name('ListOfValues.index')->middleware(['web', 'auth']);