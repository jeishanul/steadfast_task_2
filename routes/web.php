<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\UrlController;
use Illuminate\Support\Facades\Route;

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

// Routes for Auth
Route::middleware('auth')->group(function () {
    Route::get('/', [UrlController::class, 'home'])->name('home');
    Route::post('urls', [UrlController::class, 'store'])->name('url.store');
    Route::get('logout', [LoginController::class, 'logout'])->name('logout');
});

// Routes for Url
Route::get('{code}', [UrlController::class, 'shorten'])->name('url.shorten');
