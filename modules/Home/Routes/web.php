<?php
 use Illuminate\Support\Facades\Route;

 Route::prefix('admin')->name('admin.')->group(function() {
         Route::prefix('home')->name('home.')->group(function() {

               Route::get('/', 'HomeController@index')->name('index');

               Route::get('/data', 'HomeController@data')->name('data');

               Route::get('/create', 'HomeController@create')->name('create');

               Route::post('/create', 'HomeController@store')->name('store');

               Route::get('/edit/{home}','HomeController@edit')->name('edit');

               Route::put('/edit/{home}','HomeController@update')->name('update');

               Route::delete('/delete/{home}','HomeController@delete')->name('delete');
         });
     });


