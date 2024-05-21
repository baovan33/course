<?php
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin', 'as' =>'admin.'] , function() {

    Route::prefix('lessons')->name('lessons.')->group( function () {

        Route::get('/{courseId}', 'LessonsController@index')->name('index');

        Route::get('/data', 'lessonsController@data')->name('data');

        Route::get('/{courseId}/create', 'LessonsController@create')->name('create');

        Route::post('/create', 'lessonsController@store')->name('store');

        Route::get('/edit/{lessons}', 'lessonsController@edit')->name('edit');

        Route::put('/edit/{lessons}', 'lessonsController@update')->name('update');

        Route::delete('/delete/{lessons}', 'lessonsController@delete')->name('delete');
    });
 });

Route::group(['prefix' => 'filemanager'], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});
