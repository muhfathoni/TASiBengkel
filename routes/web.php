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
// Route::get('/', 'HomeController@index')->name('home');

Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth','admin']], function (){

    Route::get('/dashboard', 'Admin\DashboardController@index');
    
    Route::get('/bookingadmin','Admin\DashboardController@booking');
    
    Route::get('/dashboard/chart/{year?}','Admin\DashboardController@chart');

    Route::post('/revenue','Admin\DashboardController@income');

    Route::get('/revenue', 'Admin\DashboardController@revenue');

    Route::get('/revenue/chart/{year?}', 'Admin\DashboardController@chartrevenue');

    Route::get('/inputbarang' , 'Admin\DashboardController@inputbarang');

    Route::post('/tambahbarang' , 'Admin\DashboardController@tambahbarang');

    Route::get('/deletebarang/{id}', 'Admin\DashboardController@deletebarang');

    Route::get('/editbarang/{id}', 'Admin\DashboardController@edit');

    Route::post('/editbarang/{id}', 'Admin\DashboardController@editbarang');

    Route::get('/inputmitra' , 'Admin\DashboardController@inputmitra');

    Route::post('/tambahmitra' , 'Admin\DashboardController@tambahmitra');

    Route::get('/deletemitra/{id}', 'Admin\DashboardController@deletemitra');

    Route::get('/editmitra/{id}', 'Admin\DashboardController@editmitra');

    Route::post('/editmitra/{id}', 'Admin\DashboardController@editmitrasibengkel');

    Route::get('/markNotif', 'Admin\DashboardController@markNotif');

    Route::get('/statusbarangadmin' , 'Admin\DashboardController@statusbarangadmin')->name('statusbarangadmin');

    Route::get('/successOrder/{id}', 'Admin\DashboardController@sucessOrder')->name('successOrder');

    // Route::get('/stockbarang','Admin\DashboardController@stockbarang' );

    // Route::get('/jumlahpendapatan','Admin\DashboardController@jumlahpendapatan' );

    // Route::get('/jumlahmitra','Admin\DashboardController@jumlahmitra' );
        
    Route::get('/symlink', function () {
        \Artisan::call('storage:link');
        });
});

//punya toni sampe sini


//ini punya ganes

Route::get('bookingservice', function(){
 return view ('bookingservice');
});


Route::get('getNotification', 'addtocartcontroller@getNotification')->name('getNotification');

Route::post('/bookingservice/insert', 'bookingserviceController@store');
Route::get('bookingservice', 'bookingserviceController@index')->middleware('checkbooking');

Route::get('booking', 'BookingController@index')->name('booking')->middleware('checkbooking');
Route::get('optionbooking/{id}', 'BookingController@namaservis');
Route::get('gethargaservcie/{id}', 'BookingController@getHargaService');
Route::get('booking/{id}', 'BookingController@destroy');

Route::get('produk', 'produkController@index');
Route::get('/produk/{id}', 'produkController@show')->name('produkdetail');

Route::get('cart/{id}', 'produkController@addtocart');
Route::get('viewcart/{id}', 'addtocartcontroller@destroy');
Route::get('viewcart', 'addtocartcontroller@index');

Route::prefix('payment')->group(function () {
    Route::post('/', 'midtransController@getToken');
    Route::get('/finish','midtransController@finish');
});

Route::get('/logout', 'Auth\logoutController@logout');

Route::get('mitra', 'inputmitraController@index');

Route::get('pembelian', 'pembelianbarangController@index');
Route::post('pembelianbarang/insert', 'pembelianbarangController@store');

Route::get('alamat', 'alamatController@index')->name('alamat');
Route::post('alamat/insert', 'alamatController@store')->name('insertAlamat');

Route::get('profile', 'alamatController@profile');



// Route::get('barangdibayar', function(){
//  return view ('barangdibayar');
// });

// Route::get('pembelianbarang', function(){
//     return view ('pembelianbarang');
// });

// Route::get('jenis', function(){
//     return view ('jenis');
// });