<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PenghitunganGajiController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('dashboard');

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'App\Http\Controllers\UserController');
	Route::resource('karyawan', 'App\Http\Controllers\KaryawanController');
	Route::resource('penghitungan_gaji', 'App\Http\Controllers\PenghitunganGajiController');
    // Route::get('/get-karyawan-detail', 'PenghitunganGajiController@getKaryawanDetail')->name('get-karyawan-detail');
    Route::get('/get-karyawan-detail', [PenghitunganGajiController::class, 'getKaryawanDetail'])->name('get-karyawan-detail');


});

Route::group(['middleware' => 'auth'], function () {
	Route::get('{page}', ['as' => 'page.index', 'uses' => 'App\Http\Controllers\PageController@index']);
});

