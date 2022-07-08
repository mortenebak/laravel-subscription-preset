<?php

// Dashboard
use App\Http\Controllers\Auth\EmailVerificationController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\UserController;
use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Auth\Passwords\Confirm;
use App\Http\Livewire\Auth\Passwords\Email;
use App\Http\Livewire\Auth\Passwords\Reset;
use App\Http\Livewire\Auth\Register;
use App\Http\Livewire\Auth\Verify;
use Illuminate\Support\Facades\Route;

/* Frontpage */
Route::view('/', 'welcome')->name('home');

/* Login and auth stuff */
Route::middleware('guest')->group(function () {
    Route::get('login', Login::class)
        ->name('login');

    Route::get('register', Register::class)
        ->name('register');
});

Route::get('password/reset', Email::class)
    ->name('password.request');

Route::get('password/reset/{token}', Reset::class)
    ->name('password.reset');

Route::middleware('auth')->group(function () {
    Route::get('email/verify', Verify::class)
        ->middleware('throttle:6,1')
        ->name('verification.notice');

    Route::get('password/confirm', Confirm::class)
        ->name('password.confirm');
});

Route::middleware('auth')->group(function () {
    Route::get('email/verify/{id}/{hash}', EmailVerificationController::class)
        ->middleware('signed')
        ->name('verification.verify');

    Route::post('logout', LogoutController::class)
        ->name('logout');
});

Route::get('/dashboard', \App\Http\Livewire\Dashboard::class)->name('dashboard');

// Plans
Route::group(['namespace' => 'Subscriptions'], function () {
    Route::get('/plans', [\App\Http\Controllers\Subscriptions\PlanController::class, 'index'])->name('subscriptions.plans');
    Route::get('/subscriptions', [\App\Http\Controllers\Subscriptions\SubscriptionController::class, 'index'])->name('subscriptions');
    Route::post('/subscriptions', [\App\Http\Controllers\Subscriptions\SubscriptionController::class, 'store'])->name('subscriptions.store');
});

// Subscription and Account stuff
Route::group(['namespace' => 'Account', 'prefix' => 'account'], function () {

    Route::get('/', [\App\Http\Controllers\Account\AccountController::class, 'index'])->name('account');
    Route::get('/settings', [UserController::class, 'edit'])->name('settings.edit');
    Route::post('/settings', [UserController::class, 'update'])->name('settings.update');

    Route::group(['namespace' => 'Subscriptions', 'prefix' => 'subscriptions'], function () {
        Route::get('/', [\App\Http\Controllers\Account\Subscriptions\SubscriptionController::class, 'index'])->name('account.subscriptions');

        Route::get('/cancel', [\App\Http\Controllers\Account\Subscriptions\SubscriptionCancelController::class, 'index'])->name('account.subscriptions.cancel');
        Route::post('/cancel', [\App\Http\Controllers\Account\Subscriptions\SubscriptionCancelController::class, 'store'])->name('account.subscriptions.cancel');

        Route::get('/resume', [\App\Http\Controllers\Account\Subscriptions\SubscriptionResumeController::class, 'index'])->name('account.subscriptions.resume');
        Route::post('/resume', [\App\Http\Controllers\Account\Subscriptions\SubscriptionResumeController::class, 'store'])->name('account.subscriptions.resume');

        Route::get('/invoices', [\App\Http\Controllers\Account\Subscriptions\SubscriptionInvoiceController::class, 'index'])->name('account.subscriptions.invoices');
        Route::get('/invoices/{id}', [\App\Http\Controllers\Account\Subscriptions\SubscriptionInvoiceController::class, 'show'])->name('account.subscriptions.invoice');

        Route::get('/swap', [\App\Http\Controllers\Account\Subscriptions\SubscriptionSwapController::class, 'index'])->name('account.subscriptions.swap');
        Route::post('/swap', [\App\Http\Controllers\Account\Subscriptions\SubscriptionSwapController::class, 'store'])->name('account.subscriptions.swap');

        Route::get('/card', [\App\Http\Controllers\Account\Subscriptions\SubscriptionCardController::class, 'index'])->name('account.subscriptions.card');
        Route::post('/card', [\App\Http\Controllers\Account\Subscriptions\SubscriptionCardController::class, 'store'])->name('account.subscriptions.card');

        Route::get('/coupon', [\App\Http\Controllers\Account\Subscriptions\SubscriptionCouponController::class, 'index'])->name('account.subscriptions.coupon');
        Route::post('/coupon', [\App\Http\Controllers\Account\Subscriptions\SubscriptionCouponController::class, 'store'])->name('account.subscriptions.coupon');

    });
});
