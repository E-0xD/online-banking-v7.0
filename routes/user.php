<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\User\ProfileController;
use App\Http\Controllers\Dashboard\User\DashboardController;

Route::middleware('user')->prefix('user')->group(function () {
    Route::get('/dashboard', DashboardController::class)->name('user.dashboard');

    Route::get('/profile', [ProfileController::class, 'index'])->name('user.profile.index');
});
