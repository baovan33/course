<?php

Route::group(['prefix' => 'admin', 'as' =>'admin.'] , function() {

    Route::prefix('tests')->name('tests.')->group( function () {

        Route::get('/', 'testController@index')->name('index');

        Route::get('/data', 'testController@data')->name('data');

        Route::get('/create', 'testController@create')->name('create');

        Route::post('/create', 'testController@store')->name('store');

        Route::get('/edit/{test}', 'testController@edit')->name('edit');

        Route::put('/edit/{test}', 'testController@update')->name('update');

        Route::delete('/delete/{test}', 'testController@delete')->name('delete');
    });
 });
