<?php

use App\Http\Controllers\Admin;
use App\Http\Controllers\Login;
use App\Http\Controllers\Siswa;
use App\Http\Middleware\CekUserLogin;
use App\Http\Controllers\Spp;
use Illuminate\Support\Facades\Route;

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

Route::get('/login', [Login::class, 'index'])->name('login');
Route::post('/login/proses', [Login::class, 'proses']);
Route::get('/logout', [Login::class, 'logout']);

Route::group(['middleware' => ['auth']], function () {
    Route::group(['middleware' => ['cekUserLogin:admin']], function () {
        Route::resource('admin', Admin::class);
    });
    Route::group(['middleware' => ['cekUserLogin:siswa']], function () {
        Route::resource('siswa', Siswa::class);
    });
});

Route::get('/pembayaran', [Spp::class, 'index']);
Route::get('/siswa', [Spp::class, 'index']);
Route::post('/pembayaran/save', [Spp::class, 'save']);

// Route delete
Route::delete('pembayaran/delete/{id}', [Spp::class, 'delete'])->name('pembayaran.delete');

// Route Edit
Route::get('pembayaran/edit/{id}', [Spp::class, 'edit'])->name('pembayaran.edit');

// Route Update
Route::put('pembayaran/update/{id}', [Spp::class, 'update'])->name('pembayaran.update');

Route::get('/siswa', [Siswa::class, 'index']);

Route::get('excel-export', [Spp::class, 'exportExcel']);

