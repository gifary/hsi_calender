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

Route::get('/', function () {
    return view('welcome');
});
Route::get('province','ProvinceController@index')->name('province');
Route::get('city','CityController@index')->name('city');
Route::group(['middleware' => 'auth'], function () {
    //    Route::get('/link1', function ()    {
//        // Uses Auth Middleware
//    });

    //Please do not remove this if you want adminlte:route and adminlte:link commands to works correctly.
    #adminlte_routes
	Route::group(['prefix' => 'order_history'], function () {
	    Route::get('/', 'OrderHistoryController@index')->name('order_history');
        Route::post('/', 'OrderHistoryController@store')->name('order_history.store');
        Route::get('/edit/{id}', 'OrderHistoryController@edit')->name('order_history.edit');
        Route::get('/create', 'OrderHistoryController@create')->name('order_history.create');
        Route::get('/show/{id}', 'OrderHistoryController@show')->name('order_history.show');
        Route::get('/data', 'OrderHistoryController@data')->name('order_history.data');
        Route::put('/update/{id}', 'OrderHistoryController@update')->name('order_history.update');
        Route::get('/delete/{id}', 'OrderHistoryController@destroy')->name('order_history.delete');
	});
});
