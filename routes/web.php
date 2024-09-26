<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\UrlController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Routes for Guest
Route::middleware(['guest'])->group(function () {
    // Routes for Login
    Route::controller(LoginController::class)->group(function () {
        Route::get('login', 'login')->name('login');
        Route::post('login', 'loginRequest')->name('login.request');
    });
    // Routes for Register
    Route::controller(RegisterController::class)->group(function () {
        Route::get('register', 'register')->name('register');
        Route::post('register', 'registerRequest')->name('register.request');
    });
});

Route::middleware('auth')->group(function () {
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/urls', [UrlController::class, 'index'])->name('url.index');
    Route::post('/urls', [UrlController::class, 'store'])->name('url.store');
});

Route::get('/{code}', [UrlController::class, 'shorten'])->name('url.shorten');
