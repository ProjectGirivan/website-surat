<?php

use App\Models\suratBiasa;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\sicKelController;
use App\Http\Controllers\sijKelController;
use App\Http\Controllers\telegramController;
use App\Http\Controllers\NotaDinasController;
use App\Http\Controllers\suratBiasaController;
use App\Http\Controllers\keluarBiasaController;
use App\Http\Controllers\notaDinasKelController;
use App\Http\Controllers\rahasiaKeluarController;
use App\Http\Controllers\suratPerintahController;
use App\Http\Controllers\suratKeputusanController;
use App\Http\Controllers\suratPerintahKelController;
use App\Http\Controllers\suratKeputusanKelController;
use App\Http\Controllers\suratRekomendasiKelController;
use App\Http\Controllers\SuratRahasiaController; // Perbaiki penamaan sesuai standar PSR-4

// Routes for authentication
Route::middleware('isTamu')->group(function () {
    Route::get('/sesi', [AuthController::class, 'index']);
    Route::post('/sesi/login', [AuthController::class, 'login']);
});

Route::get('/sesi/logout', [AuthController::class, 'logout'])->middleware('isLogin'); // Tambahkan middleware untuk logout

// Dashboard view
Route::get('/', function () {
    return view('layouts.dashboard');
})->middleware('isLogin')->name('home');


// UNTUK SURAT MASUK
Route::resource('surat-masuk-notaDinas', NotaDinasController::class)->middleware('isLogin');
Route::resource('surat-masuk-suratRahasia', SuratRahasiaController::class)->middleware('isLogin');
Route::resource('surat-masuk-telegram', telegramController::class)->middleware('isLogin');
Route::resource('surat-masuk-suratBiasa', suratBiasaController::class)->middleware('isLogin');
Route::resource('surat-masuk-suratKeputusan', suratKeputusanController::class)->middleware('isLogin');
Route::resource('surat-masuk-suratPerintah', suratPerintahController::class)->middleware('isLogin');

// UNTUK SURAT KELUAR
Route::resource('surat-keluar-suratKeputusanKel', suratKeputusanKelController::class)->middleware('isLogin');
Route::resource('surat-keluar-Rekomendasi', suratRekomendasiKelController::class)->middleware('isLogin');
Route::resource('surat-keluar-SIC', sicKelController::class)->middleware('isLogin');
Route::resource('surat-keluar-SIJ', sijKelController::class)->middleware('isLogin');
Route::resource('surat-keluar-suratPerintahKel', suratPerintahKelController::class)->middleware('isLogin');
Route::resource('surat-keluar-notaDinasKel', notaDinasKelController::class)->middleware('isLogin');
Route::resource('surat-keluar-keluarBiasa', keluarBiasaController::class)->middleware('isLogin');
Route::resource('surat-keluar-rahasiaKeluar', rahasiaKeluarController::class)->middleware('isLogin');
