<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LandingController;

Route::get('/', [LandingController::class, 'index'])->name('home');
Route::post('/contact', [LandingController::class, 'contact'])->name('contact');
