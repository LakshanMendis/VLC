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
Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/reports', function () {
    return view('pages.reports');
});

Route::get('/addLocations', function () {
    return view('pages.additems.addLocations');
});

Route::get('/addDriver','HomeController@getDriver');

Route::get('/addVehicle','HomeController@getVehicle');

Route::get('/tours','HomeController@tours');

Route::get('/newTours','HomeController@newTours');

Route::post('/newRoute','HomeController@newRoute');

Route::get('/expence','HomeController@expence');

Route::post('/newExpence','HomeController@newExpence');

Route::get('/fuel','HomeController@fuel');

Route::post('/fuelconsumption','HomeController@newfuel');

Route::post('/vehicles','HomeController@vehicles');

Route::post('/driver','HomeController@driver');

Route::post('/locations','HomeController@cities');

Route::get('/rowRoute','HomeController@rowRoute');

Route::get('/getvehicle','HomeController@get_vehicle');

Route::get('/newToursRepo','HomeController@viewTours');

