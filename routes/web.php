<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;

Route::get('/', [SiteController::class, 'index'])->name('index');
Route::get('/book-your-stay', [SiteController::class, 'bookYourStay'])->name('book.your.stay');
Route::get('/faqs', [SiteController::class, 'faqs'])->name('faqs');
Route::get('/gallery', [SiteController::class, 'gallery'])->name('gallery');
Route::get('/contact', [SiteController::class, 'contact'])->name('contact');
