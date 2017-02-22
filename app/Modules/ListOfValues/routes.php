<?php

Route::get('ListOfValues', 'App\Modules\ListOfValues\Controllers\ListOfValuesController@index')->name('ListOfValues.index')->middleware(['web', 'auth']);
Route::get('ListOfValues/getTableColumns/{table}', 'App\Modules\ListOfValues\ListOfValueHelper@getColumns')->name('ListOfValues.getColumn')->middleware(['web', 'auth']);