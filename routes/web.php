<?php

use Illuminate\Support\Facades\Route;

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
    return view('home');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth','admin']], function (){

    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    });

Route::get('/booking','Admin\DashboardController@booking');
    
});

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