<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Import semua controller API yang digunakan
use App\Http\Controllers\Api\APIGuruController;
use App\Http\Controllers\Api\APISiswaController;
use App\Http\Controllers\Api\APIIndustriController;
use App\Http\Controllers\Api\APIPklController;
use App\Http\Controllers\Api\APIUserController;

// Route untuk mengambil data user yang sedang login menggunakan Sanctum
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Route API resource untuk entitas Guru (CRUD otomatis)
Route::apiResource('guru', APIGuruController::class);

// Route API resource untuk entitas Siswa
Route::apiResource('siswa', APISiswaController::class);

// Route API resource untuk entitas Industri
Route::apiResource('industri', APIIndustriController::class);

// Route API resource untuk entitas PKL (Praktik Kerja Lapangan)
Route::apiResource('pkl', APIPklController::class);

// Route API resource untuk entitas User
Route::apiResource('user', APIUserController::class);
