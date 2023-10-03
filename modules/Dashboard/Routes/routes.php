<?php
 use Illuminate\Support\Facades\Route;

 Route::group(['namespace' => 'Modules\Dashboard\Src\Http\Controllers'], function() {
     Route::prefix('admin')->group(function() {
         Route::get('/', 'DashboardController@index')->name('admin.dashboard');

     });

 });
