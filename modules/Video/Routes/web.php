<?php

Route::group(['prefix' => 'admin', 'as' =>'admin.'] , function() {

    Route::prefix('videos')->name('videos.')->group( function () {

        Route::get('/', 'videoController@index')->name('index');

        Route::get('/data', 'videoController@data')->name('data');

        Route::get('/create', 'videoController@create')->name('create');

        Route::post('/create', 'videoController@store')->name('store');

        Route::get('/edit/{video}', 'videoController@edit')->name('edit');

        Route::put('/edit/{video}', 'videoController@update')->name('update');

        Route::delete('/delete/{video}', 'videoController@delete')->name('delete');
    });
 });
