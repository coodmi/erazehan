<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\AdminController;

// ── Public ──────────────────────────────────────────────
Route::get('/',        [LandingController::class, 'index'])->name('home');
Route::post('/contact',[LandingController::class, 'contact'])->name('contact');

// ── Admin Auth ──────────────────────────────────────────
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get ('login',  [AdminController::class, 'loginForm'])->name('login');
    Route::post('login',  [AdminController::class, 'login']);
    Route::post('logout', [AdminController::class, 'logout'])->name('logout');

    // Protected
    Route::middleware('auth')->group(function () {
        Route::get ('dashboard',       [AdminController::class, 'dashboard'])->name('dashboard');
        Route::post('contacts/{contact}/status', [AdminController::class, 'updateStatus'])->name('contacts.status');
        Route::delete('contacts/{contact}',      [AdminController::class, 'deleteContact'])->name('contacts.delete');
        Route::get ('change-password', [AdminController::class, 'changePasswordForm'])->name('change-password');
        Route::post('change-password', [AdminController::class, 'changePassword']);
    });
});
