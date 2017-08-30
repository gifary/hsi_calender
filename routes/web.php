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
})->name('fe');
// Route::get('/tes', function () {
//     $order_history = \App\OrderHistory::first();
//     \Mail::to("muhammadgifary@gmail.com")
//             ->send(new \App\Mail\OrderShipped($order_history));
// })->name('tes');

Route::get('province','ProvinceController@index')->name('province');
Route::get('province/get_city/{id}','ProvinceController@get_city')->name('province.get_city');
Route::get('city','CityController@index')->name('city');

Route::get('order','OrderController@index')->name('order');
Route::get('order/list_kurir/{city_id}/{jumlah_order}','OrderController@list_kurir')->name('order.list_kurir');
Route::post('order','OrderController@store')->name('order');

Route::get("konfirmasi/{no_invoice?}","KonfirmasiController@index")->name('konfirmasi');
Route::post("konfirmasi","KonfirmasiController@store")->name('konfirmasi');

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
        Route::get('download','OrderHistoryController@download')->name('order_history.download');
        Route::get('download_bukti_trf/{nama_file}','OrderHistoryController@download_bukti_trf')->name('order_history.download_bukti_trf')->where('nama_file', '(.*)');
;
	});

    Route::group(['prefix' => 'setting'], function () {
        Route::get('/', 'SettingController@index')->name('setting');
        Route::put('/update/{id}', 'SettingController@update')->name('setting.update');
    });
});
