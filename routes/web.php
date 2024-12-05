<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ScrapingController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Auth::routes();
Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->middleware('auth')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('/scraping/index', [ScrapingController::class, 'index'])->name('scraping.index');
    Route::get('/scraping/create', [ScrapingController::class, 'create'])->name('scraping.create');
    Route::post('/scraping/store', [ScrapingController::class, 'store'])->name('scraping.store');
});
Route::prefix('user')->name('user.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboardUser'])->name('dashboard');
});


require __DIR__ . '/auth.php';
