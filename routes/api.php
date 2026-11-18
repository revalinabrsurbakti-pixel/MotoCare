<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\PelangganApiController;
use App\Http\Controllers\Api\KendaraanApiController;
use App\Http\Controllers\Api\DaftarServiceApiController;
use App\Http\Controllers\Api\DataServiceApiController;
use App\Http\Controllers\Api\PembayaranServiceApiController;

// API PELANGGAN
Route::apiResource('pelanggans', PelangganApiController::class);

// API KENDARAAN
Route::apiResource('kendaraans', KendaraanApiController::class);

// API DAFTAR SERVICE
Route::apiResource('daftar-services', DaftarServiceApiController::class);

// API DATA SERVICE
Route::apiResource('data-services', DataServiceApiController::class);

// API PEMBAYARAN SERVICE
Route::apiResource('pembayaran-services', PembayaranServiceApiController::class);
