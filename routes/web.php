<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\Auth\LoginController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminLoginController;


Route::get('login', function(){
    return redirect()->route('index');
})->name('login');

Route::get('/', [SiteController::class, 'index'])->name('index');
Route::get('/book-your-stay', [SiteController::class, 'bookYourStay'])->name('book.your.stay');
Route::get('/faqs', [SiteController::class, 'faqs'])->name('faqs');
Route::get('/gallery', [SiteController::class, 'gallery'])->name('gallery');
Route::get('/contact', [SiteController::class, 'contact'])->name('contact');

//Admin Routes
Route::prefix('admin')->name('admin.')->group(function () {

    Route::get('/login', [AdminLoginController::class, 'login'])->name('login');
    Route::post('/login/submit', [AdminLoginController::class, 'loginSubmit'])->name('login.submit');

    // Authenticated Routes
    Route::middleware(['auth:admin'])->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
        Route::get('/logout', [AdminLoginController::class, 'logout'])->name('logout');
    });
});

//User Routes
Route::prefix('user')->name('user.')->group(function () {

    //Login Routes
    Route::prefix('login')->name('login.')->group(function () {
        Route::get('/google', [LoginController::class, 'google'])->name('google');
        Route::get('/google/callback', [LoginController::class, 'googleCallback'])->name('google.callback');
    });

    // Authenticated Routes
    Route::middleware(['auth:web'])->group(function () {
        Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');
        Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
    });
});

