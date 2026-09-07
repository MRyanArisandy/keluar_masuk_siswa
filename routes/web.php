<?php

use Illuminate\Support\Facades\Route;

// Main landing page / login view
Route::get('/', function () {
    return view('welcome');
});

// Alias routes so users can access /login, /Login, /dashboard, etc. without 404 error
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
