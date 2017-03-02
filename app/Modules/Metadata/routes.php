<?php

Route::get('Metadata', 'App\Modules\Metadata\Controllers\MetadataController@index')->name('Metadata.index')->middleware(['web', 'auth']);
Route::get('Metadata/getList', 'App\Modules\Metadata\Controllers\MetadataController@getList')->name('Metadata.getList')->middleware(['web', 'auth']);