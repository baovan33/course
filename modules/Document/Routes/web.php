<?php

Route::group(['prefix' => 'admin', 'as' =>'admin.'] , function() {

    Route::prefix('documents')->name('documents.')->group( function () {

        Route::get('/', 'documentController@index')->name('index');

        Route::get('/data', 'documentController@data')->name('data');

        Route::get('/create', 'documentController@create')->name('create');

        Route::post('/create', 'documentController@store')->name('store');

        Route::get('/edit/{document}', 'documentController@edit')->name('edit');

        Route::put('/edit/{document}', 'documentController@update')->name('update');

        Route::delete('/delete/{document}', 'documentController@delete')->name('delete');
    });
 });
