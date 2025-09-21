<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\TwoFactorAuthenticationController;

Route::middleware('guestUser')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])
        ->name('register');

    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
        ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    Route::get('/forgot/password', [PasswordResetLinkController::class, 'create'])
        ->name('password.request');

    Route::post('/forgot/password', [PasswordResetLinkController::class, 'store'])
        ->name('password.email');

    Route::get('/reset/password/{token}', [NewPasswordController::class, 'create'])
        ->name('password.reset');

    Route::post('/reset/password', [NewPasswordController::class, 'store'])
        ->name('password.store');
});
Route::middleware('auth')->group(function () {
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');

    Route::get('/verify/email', [VerifyEmailController::class, 'create'])
        ->name('verify.email');

    Route::post('/verify/email', [VerifyEmailController::class, 'store']);

    Route::post('/verify/email/send', [VerifyEmailController::class, 'send'])->name('verify.email.send');
});

Route::get('/two/factor/authentication', [TwoFactorAuthenticationController::class, 'index'])->name('two_factor_authentication');
Route::post('/two/factor/authentication', [TwoFactorAuthenticationController::class, 'store']);
Route::post('/two/factor/authentication/send', [TwoFactorAuthenticationController::class, 'send'])->name('two_factor_authentication.send');