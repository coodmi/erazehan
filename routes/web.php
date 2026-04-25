<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\HeroController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\StatController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\WhyUsController;
use App\Http\Controllers\Admin\SettingsController;

use App\Http\Controllers\Admin\FooterController;
use App\Http\Controllers\Admin\NavController;

// ── Public ──────────────────────────────────────────────
Route::get('/',         [LandingController::class, 'index'])->name('home');
Route::post('/contact', [LandingController::class, 'contact'])->name('contact');

// ── Admin ───────────────────────────────────────────────
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get ('login',  [AdminController::class, 'loginForm'])->name('login');
    Route::post('login',  [AdminController::class, 'login']);
    Route::post('logout', [AdminController::class, 'logout'])->name('logout');

    Route::middleware('auth')->group(function () {
        Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
        Route::get ('change-password', [AdminController::class, 'changePasswordForm'])->name('change-password');
        Route::post('change-password', [AdminController::class, 'changePassword']);

        // Contacts
        Route::get    ('contacts',                  [AdminController::class, 'dashboard'])->name('contacts.index');
        Route::post   ('contacts/{contact}/status', [AdminController::class, 'updateStatus'])->name('contacts.status');
        Route::delete ('contacts/{contact}',        [AdminController::class, 'deleteContact'])->name('contacts.delete');

        // Hero Slides
        Route::resource('hero',         HeroController::class)->except(['show'])->names('hero');

        // Services
        Route::resource('services',     ServiceController::class)->except(['show'])->names('services');

        // Stats
        Route::get ('stats',            [StatController::class, 'index'])->name('stats.index');
        Route::post('stats',            [StatController::class, 'store'])->name('stats.store');
        Route::post('stats/update',     [StatController::class, 'update'])->name('stats.update');
        Route::delete('stats/{stat}',   [StatController::class, 'destroy'])->name('stats.destroy');

        // Testimonials
        Route::resource('testimonials', TestimonialController::class)->except(['show'])->names('testimonials');

        // Why Us
        Route::get   ('whyus',          [WhyUsController::class, 'index'])->name('whyus.index');
        Route::post  ('whyus',          [WhyUsController::class, 'store'])->name('whyus.store');
        Route::put   ('whyus/{whyus}',  [WhyUsController::class, 'update'])->name('whyus.update');
        Route::delete('whyus/{whyus}',  [WhyUsController::class, 'destroy'])->name('whyus.destroy');

        // Footer
        Route::get   ('footer',               [FooterController::class, 'index'])->name('footer.index');
        Route::post  ('footer/settings',      [FooterController::class, 'saveSettings'])->name('footer.settings');
        Route::post  ('footer/links',         [FooterController::class, 'storeLink'])->name('footer.links.store');
        Route::put   ('footer/links/{footer}',[FooterController::class, 'updateLink'])->name('footer.links.update');
        Route::delete('footer/links/{footer}',[FooterController::class, 'destroyLink'])->name('footer.links.destroy');

        // Nav / Header
        Route::get   ('nav',            [NavController::class, 'index'])->name('nav.index');
        Route::post  ('nav',            [NavController::class, 'store'])->name('nav.store');
        Route::put   ('nav/{nav}',      [NavController::class, 'update'])->name('nav.update');
        Route::delete('nav/{nav}',      [NavController::class, 'destroy'])->name('nav.destroy');
        Route::post  ('nav/header',     [NavController::class, 'saveHeader'])->name('nav.header');

        // Settings
        Route::get ('settings',         [SettingsController::class, 'index'])->name('settings.index');
        Route::post('settings',         [SettingsController::class, 'update'])->name('settings.update');
    });
});
