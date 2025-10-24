<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\User\InquiryController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\User\BookingController;
use App\Http\Controllers\User\Auth\LoginController;
use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\User\Auth\FirebaseController;


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
    Route::get('/forget/password', [AdminLoginController::class, 'forgetPassword'])->name('forget.password');
    Route::post('/email/verify', [AdminLoginController::class, 'emailVerify'])->name('email.verify');
    Route::get('/otp/verify', [AdminLoginController::class, 'otpVerify'])->name('otp.verify');
    Route::post('/otp/check', [AdminLoginController::class, 'otpCheck'])->name('otp.check');
    Route::get('/reset/password', [AdminLoginController::class, 'resetPassword'])->name('reset.password');
    Route::post('/update/password', [AdminLoginController::class, 'updatePassword'])->name('update.password');



    // Authenticated Routes
    Route::middleware(['auth:admin'])->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
        // Inquiries list
        Route::get('/inquiries', [AdminController::class, 'showInquiries'])->name('pages.inquiries');
        // Bookings list
        Route::get('/bookings', [AdminController::class, 'showBookings'])->name('pages.bookings');
        Route::get('/logout', [AdminLoginController::class, 'logout'])->name('logout');
    });
});

//User Routes
Route::prefix('user')->name('user.')->group(function () {

    //Login Routes
    Route::prefix('login')->name('login.')->group(function () {
        //Google Login
        Route::get('/google', [LoginController::class, 'google'])->name('google');
        Route::get('/google/callback', [LoginController::class, 'googleCallback'])->name('google.callback');

        //firebase login 
        Route::post('/auth/firebase-login', [FirebaseController::class, 'login'])->name('firebase');
        Route::post('/auth/firebase-logout', [FirebaseController::class, 'logout'])->name('firebase.logout');
    });

    // Authenticated Routes
    Route::middleware(['auth:web'])->group(function () {
        Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');
        Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

        Route::get('/booking/list', [BookingController::class, 'bookingList'])->name('booking.list');
        Route::post('/booking', [BookingController::class, 'booking'])->name('booking');
        Route::get('/checkout/{booking}', [BookingController::class, 'checkout'])->name('checkout');
        Route::post('/booking/confirm', [BookingController::class, 'bookingConfirm'])->name('booking.confirm');

        Route::get('/checkout/session/{booking}', [PaymentController::class, 'createCheckoutSession'])->name('checkout.session');
        Route::get('/payment/success/', [PaymentController::class, 'success'])->name('payment.success');
        Route::get('/payment/cancel', [PaymentController::class, 'cancel'])->name('payment.cancel');
    });

    // Inquiry Form Submission
    Route::post('/inquiry-submit', [InquiryController::class, 'submit'])->name('inquiry.submit');
});

