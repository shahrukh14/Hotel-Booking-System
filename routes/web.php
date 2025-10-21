<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\User\Auth\LoginController;

Route::get('/', [SiteController::class, 'index'])->name('index');
Route::get('/book-your-stay', [SiteController::class, 'bookYourStay'])->name('book.your.stay');
Route::get('/faqs', [SiteController::class, 'faqs'])->name('faqs');
Route::get('/gallery', [SiteController::class, 'gallery'])->name('gallery');
Route::get('/contact', [SiteController::class, 'contact'])->name('contact');

//User Routes
Route::prefix('user')->name('user.')->group(function () {

    //Login Routes
    Route::prefix('login')->name('login.')->group(function () {
        Route::get('/google', [LoginController::class, 'google'])->name('google');
        Route::get('/google/callback', [LoginController::class, 'googleCallback'])->name('google.callback');
    });

    // Authenticated Routes
    Route::middleware(['auth:web'])->group(function () {

    });
});

