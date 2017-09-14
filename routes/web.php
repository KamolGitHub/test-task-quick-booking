<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/quick-booking', 'BookingController@create')->name('booking.create');
Route::post('/quick-booking', 'BookingController@store')->name('booking.store');

