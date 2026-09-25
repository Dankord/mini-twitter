<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChirpController;

Route::get('/', [ChirpController::class, 'index']);
Route::resource('chirps', ChirpController::class)->only(['store', 'edit', 'update', 'destroy']);

// Route::post('/chirps', [ChirpController::class, 'store']);
// Route::get('chirp/{chirp}/edit', [ChirpController::class, 'edit']);
// Route::put('chirp/{chirp}', [ChirpController::class, 'update']);
// Route::delete('chirp/{chirp}', [ChirpController::class, 'destroy']);
