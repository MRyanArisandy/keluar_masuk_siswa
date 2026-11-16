<?php

use App\Http\Controllers\PerizinanController;
use Illuminate\Support\Facades\Route;

// API Endpoints for Perizinan Siswa
Route::prefix('api/perizinan')->group(function () {
    Route::get('/', [PerizinanController::class, 'index']);
    Route::post('/', [PerizinanController::class, 'store']);
    Route::get('/stats', [PerizinanController::class, 'stats']);
    Route::patch('/{id}/status', [PerizinanController::class, 'updateStatus']);
    Route::patch('/{id}/konfirmasi', [PerizinanController::class, 'konfirmasiKembali']);
    Route::patch('/{id}/batal', [PerizinanController::class, 'batalkan']);
});

// Main landing page / login view
Route::get('/', function () {
    return view('welcome');
});

// Alias routes so users can access /login, /dashboard, etc. without 404 error
Route::get('/login', function () {
    return view('welcome');
})->name('login');

Route::get('/Login', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('welcome');
});

Route::get('/Dashboard', function () {
    return view('welcome');
});

Route::fallback(function () {
    return view('welcome');
});
