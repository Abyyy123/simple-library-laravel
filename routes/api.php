<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController; // PASTI HARUS ADA

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// PASTIKAN BARIS INI ADA
Route::apiResource('books', BookController::class);