<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PelangganController;
use App\Http\Controllers\KendaraanController;
use App\Http\Controllers\DaftarServiceController;
use App\Http\Controllers\DataServiceController;
use App\Http\Controllers\PembayaranServiceController;

use App\Models\Pelanggan;
use App\Models\Kendaraan;
use App\Models\DataService;
use App\Models\PembayaranService;


// ==========================================
// DASHBOARD MOTОCARE
// ==========================================

Route::get('/', function () {

    return view('welcome', [
        'totalPelanggan' => Pelanggan::count(),
        'totalKendaraan' => Kendaraan::count(),
        'totalService' => DataService::count(),
        'totalPembayaran' => PembayaranService::count(),
    ]);

})->name('dashboard');


// ==========================================
// DATA PELANGGAN
// ==========================================

Route::resource('pelanggan', PelangganController::class);


// ==========================================
// DATA KENDARAAN
// ==========================================

Route::resource('kendaraan', KendaraanController::class);


// ==========================================
// DAFTAR SERVICE
// ==========================================

Route::resource('daftar-service', DaftarServiceController::class);


// ==========================================
// DATA SERVICE
// ==========================================

Route::resource('data-service', DataServiceController::class);


// ==========================================
// PEMBAYARAN SERVICE
// ==========================================

Route::resource('pembayaran-service', PembayaranServiceController::class);

