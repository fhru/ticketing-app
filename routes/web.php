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

Route::get('/', 'App\Http\Controllers\HomeController@home');
Route::get('/popular', 'App\Http\Controllers\HomeController@popular');
Route::get('/about', 'App\Http\Controllers\HomeController@about');
// tiket search
Route::get('/airplane-search', 'App\Http\Controllers\HomeController@CariPesawat');
Route::get('/train-search', 'App\Http\Controllers\HomeController@CariKereta');

// list tiket
Route::get('/airplane-ticket', 'App\Http\Controllers\HomeController@TiketPesawat');
Route::get('/train-ticket', 'App\Http\Controllers\HomeController@TiketKereta');

Route::group(['middleware' => ['auth','checkRole:admin,pelanggan']], function() {
    // akun
    Route::get('/my-account', 'App\Http\Controllers\AkunController@index');
    Route::get('/my-account/airplane/order', 'App\Http\Controllers\AkunController@pesawat')->name('orderPesawat');
    Route::get('/my-account/airplane/history', 'App\Http\Controllers\AkunController@historyPesawat')->name('historyPesawat');

    Route::get('/my-account/train/order', 'App\Http\Controllers\AkunController@kereta')->name('orderKereta');
    Route::get('/my-account/train/history', 'App\Http\Controllers\AkunController@historyKereta')->name('historyKereta');
    
    Route::get('/my-account/airplane/expired', 'App\Http\Controllers\AkunController@expiredPesawat')->name('expiredPesawat');
    Route::get('/my-account/train/expired', 'App\Http\Controllers\AkunController@expiredKereta')->name('expiredKereta');

    Route::get('/my-account/airplane/payment/{parameter}', 'App\Http\Controllers\AkunController@paymentPesawat');  
    Route::get('/my-account/train/payment/{parameter}', 'App\Http\Controllers\AkunController@paymentKereta');
    
    Route::get('/my-account/airplane/print/{parameter}', 'App\Http\Controllers\AkunController@printPesawat');
    Route::get('/my-account/train/print/{parameter}', 'App\Http\Controllers\AkunController@printKereta');
    // form pesawat
    Route::post('/airplane-ticket/form/{parameter}', 'App\Http\Controllers\HomeController@formPesawat');
    Route::post('/airplane-ticket/form/{parameter}/payment', 'App\Http\Controllers\TransaksiPesawatController@create');
    // form kereta
    Route::post('/train-ticket/form/{parameter}', 'App\Http\Controllers\HomeController@formKereta');
    Route::post('/train-ticket/form/{parameter}/payment', 'App\Http\Controllers\TransaksiKeretaController@create');
});

// login
Route::get('/register', 'App\Http\Controllers\AuthController@register')->name('register');
Route::get('/login', 'App\Http\Controllers\AuthController@login')->name('login');
Route::post('/postlogin', 'App\Http\Controllers\AuthController@postlogin');
Route::post('/postregister', 'App\Http\Controllers\AuthController@postRegister');
Route::get('/logout', 'App\Http\Controllers\AuthController@logout');

Route::group(['middleware' => ['auth','checkRole:admin']], function () {
    Route::get('/dashboard', 'App\Http\Controllers\DashboardController@index');
    
    // // siswa
    // Route::post('/siswa/create', 'App\Http\Controllers\SiswaController@create');
    // Route::get('/siswa', 'App\Http\Controllers\SiswaController@index');
    // Route::get('/siswa/{id}/edit', 'App\Http\Controllers\SiswaController@edit');
    // Route::post('/siswa/{id}/update', 'App\Http\Controllers\SiswaController@update');
    // Route::get('/siswa/{id}/delete', 'App\Http\Controllers\SiswaController@delete');
    // Route::get('/siswa/{id}/profile', 'App\Http\Controllers\SiswaController@profile');
    
    // tiket pesawat
    Route::post('/airplane-list/create', 'App\Http\Controllers\DashboardController@createPesawat');
    Route::get('/airplane-list', 'App\Http\Controllers\DashboardController@indexPesawat');
    Route::get('/airplane-list/{id}/delete', 'App\Http\Controllers\DashboardController@deletePesawat');
    Route::get('/airplane-list/{id}/edit', 'App\Http\Controllers\DashboardController@editPesawat');
    Route::post('/airplane-list/{id}/update', 'App\Http\Controllers\DashboardController@updatePesawat');
    
    // tiket kereta
    Route::post('/train-list/create', 'App\Http\Controllers\DashboardController@createKereta');
    Route::get('/train-list', 'App\Http\Controllers\DashboardController@indexKereta');
    Route::get('/train-list/{id}/delete', 'App\Http\Controllers\DashboardController@deleteKereta');
    Route::get('/train-list/{id}/edit', 'App\Http\Controllers\DashboardController@editKereta');
    Route::post('/train-list/{id}/update', 'App\Http\Controllers\DashboardController@updateKereta');
    
    Route::get('/airplane/payed/{id}', 'App\Http\Controllers\TransaksiController@payPesawat');
    Route::get('/train/payed/{id}', 'App\Http\Controllers\TransaksiController@payKereta');
    // transaksi pesawat
    Route::get('/airplane-transactions', 'App\Http\Controllers\TransaksiController@pesawat');
    Route::get('/airplane-transactions/{id}/delete', 'App\Http\Controllers\TransaksiController@deletePesawat');
    Route::get('/airplane-transactions/{id}/edit', 'App\Http\Controllers\TransaksiController@editPesawat');
    Route::post('/airplane-transactions/{id}/update', 'App\Http\Controllers\TransaksiController@updatePesawat');
    Route::get('/airplane-transactions/{id}/detail', 'App\Http\Controllers\TransaksiController@detailPesawat');
    
    // transaksi kereta
    Route::get('/train-transactions', 'App\Http\Controllers\TransaksiController@kereta');
    Route::get('/train-transactions/{id}/delete', 'App\Http\Controllers\TransaksiController@deleteKereta');
    Route::get('/train-transactions/{id}/edit', 'App\Http\Controllers\TransaksiController@editKereta');
    Route::post('/train-transactions/{id}/update', 'App\Http\Controllers\TransaksiController@updateKereta');
    Route::get('/train-transactions/{id}/detail', 'App\Http\Controllers\TransaksiController@detailKereta');


    Route::post('/user-list/create', 'App\Http\Controllers\DashboardController@userCreate');
    Route::get('/user-list', 'App\Http\Controllers\DashboardController@user');
    Route::get('/user-list/{id}/delete', 'App\Http\Controllers\DashboardController@userDelete');
    Route::get('/user-list/{id}/edit', 'App\Http\Controllers\DashboardController@userEdit');
    Route::post('/user-list/{id}/update', 'App\Http\Controllers\DashboardController@userUpdate');

});
