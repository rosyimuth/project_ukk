<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\APIGuruController;
use App\Http\Controllers\Api\APISiswaController;
use App\Http\Controllers\Api\APIIndustriController;
use App\Http\Controllers\Api\APIPklController;
use App\Http\Controllers\Api\APIUserController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('guru', APIGuruController::class);

Route::apiResource('siswa', APISiswaController::class);
Route::apiResource('industri', APIIndustriController::class);
Route::apiResource('pkl', APIPklController::class);
Route::apiResource('user', APIUserController::class);