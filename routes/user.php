<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\User\KycController;
use App\Http\Controllers\Dashboard\User\ProfileController;
use App\Http\Controllers\Dashboard\User\SupportController;
use App\Http\Controllers\Dashboard\User\DashboardController;
use App\Http\Controllers\Dashboard\User\NotificationController;

Route::middleware('user')->prefix('user')->group(function () {
    Route::get('/dashboard', DashboardController::class)->name('user.dashboard');

    // Profile Controller
    Route::get('/profile', [ProfileController::class, 'index'])->name('user.profile.index');
    Route::get('/profile/change/image', [ProfileController::class, 'changeImage'])->name('user.profile.change_image');
    Route::patch('/profile/change/image', [ProfileController::class, 'changeImageStore']);

    Route::get('/profile/change/password', [ProfileController::class, 'changePassword'])->name('user.profile.change_password');
    Route::patch('/profile/change/password', [ProfileController::class, 'changePasswordStore']);

    Route::get('/profile/change/transaction/pin', [ProfileController::class, 'changeTransactionPin'])->name('user.profile.change_transaction_pin');
    Route::patch('/profile/change/transaction/pin', [ProfileController::class, 'changeTransactionPinStore']);

    Route::get('/profile/two/factor/authentication', [ProfileController::class, 'twoFactorAuthentication'])->name('user.profile.two_factor_authentication');
    Route::post('/profile/two/factor/authentication', [ProfileController::class, 'twoFactorAuthenticationStore']);
    Route::post('/profile/two/factor/authentication/disable', [ProfileController::class, 'twoFactorAuthenticationDisable'])->name('user.profile.two_factor_authentication.disable');

    // KYC Controller
    Route::get('/kyc', [KycController::class, 'index'])->name('user.kyc.index');
    Route::get('/kyc/form', [KycController::class, 'create'])->name('user.kyc.form');
    Route::post('/kyc/store', [KycController::class, 'store'])->name('user.kyc.store');

    // Support Controller
    Route::get('/support', [SupportController::class, 'index'])->name('user.support.index');
    ROute::post('/support/store', [SupportController::class, 'store'])->name('user.support.store');

    // Notification Controller
    Route::get('/notification', [NotificationController::class, 'index'])->name('user.notification.index');
    Route::get('/notification/{notification}', [NotificationController::class, 'show'])->name('user.notification.show');
    Route::get('/notification/{notification}/read', [NotificationController::class, 'read'])->name('user.notification.read');
});
