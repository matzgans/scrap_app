<?php

use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Route;


Route::prefix('auth')->name('auth.')->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register/store', [AuthController::class, 'registerStore'])->name('register.store');
    Route::post('/login/store', [AuthController::class, 'loginStore'])->name('login.store');
});
