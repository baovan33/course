<?php
 use Illuminate\Support\Facades\Route;

 Route::group(['namespace' => 'Modules\User\Src\Http\Controllers'], function() {
     Route::prefix('admin')->group(function() {
         Route::prefix('users')->group(function() {
            Route::get('/', 'UserController@index')->name('admin.users.index');
         });
     });

 });
