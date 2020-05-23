<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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

//punya toni

Route::get('/', function () {
    return view('home');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth','admin']], function (){

    Route::get('/dashboard', 'Admin\DashboardController@index');
    
    Route::get('/bookingadmin','Admin\DashboardController@booking');
    
    Route::get('/dashboard/chart/{year?}','Admin\DashboardController@chart');

    Route::post('/revenue','Admin\DashboardController@income');

    Route::get('/revenue', 'Admin\DashboardController@revenue');

    Route::get('/revenue/chart/{year?}', 'Admin\DashboardController@chartrevenue');

    Route::get('/inputitem' , 'Admin\DashboardController@inputitem');

    Route::post('/inputitem' , 'Admin\DashboardController@tambahitem');
});

//punya toni sampe sini

Route::get('jenis', function(){
	return view ('jenis');
});

Route::get('mitra', function(){
	return view ('mitra');
});

Route::get('pembelianbarang', function(){
	return view ('pembelianbarang');
});

Route::get('produk', 'produkController@index');

Route::get('barangdibayar', function(){
	return view ('barangdibayar');
});

Route::get('/logout', 'Auth\logoutController@logout');

Route::get('/produk/{id}', 'produkController@show')->name('produkdetail');

// Route::get('booking', function(){
// 	return view ('booking');
// });

Route::get('booking', 'BookingController@index')->name('booking')->middleware('checkbooking');
Route::post('/booking/insert', 'BookingController@store');

Route::get('cart/{id}', 'produkController@addtocart');

Route::get('viewcart', 'addtocartcontroller@index');

Route::get('optionbooking/{id}', 'BookingController@namaservis');

Route::prefix('payment')->group(function () {
    Route::post('/', 'midtransController@getToken');
    Route::get('/finish','midtransController@finish');
});

Route::get('viewcart/{id}', 'addtocartcontroller@destroy');

Route::get('test', function(){
    return view ('test');
});