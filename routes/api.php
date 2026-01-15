<?php

use Illuminate\Http\Request;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;


// Endpoint Public (Bisa diakses tanpa login)
Route::post('/login', [AuthController::class, 'login']);

// Endpoint Protected (Harus login/bawa token)
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    
    Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('books', BookController::class);
    Route::post('/logout', [AuthController::class, 'logout']);
});

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('books', BookController::class);
    Route::post('/borrow', [TransactionController::class, 'borrow']);
    Route::post('/return', [TransactionController::class, 'returnBook']);
    Route::post('/logout', [AuthController::class, 'logout']);
});

});
