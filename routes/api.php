<?php

use Illuminate\Http\Request;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

// Endpoint Public (Bisa diakses tanpa login)
Route::post('/login', [AuthController::class, 'login']);

// Endpoint Protected (Harus login/bawa token)
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    
    // Nanti route buku & transaksi taruh di sini
});
