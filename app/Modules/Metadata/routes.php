<?php

Route::get('Metadata', 'App\Modules\Metadata\Controllers\MetadataController@index')->name('Metadata.index')->middleware(['web', 'auth']);