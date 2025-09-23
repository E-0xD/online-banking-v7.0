<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\Admin\UserController;
use App\Http\Controllers\Dashboard\Admin\DashboardController;
use App\Http\Controllers\Dashboard\Admin\UserAccountStateController;
use App\Http\Controllers\Dashboard\Admin\UserKycController;
use App\Http\Controllers\Dashboard\Admin\UserNotificationController;

Route::middleware('admin')->prefix('admin')->group(function () {
    Route::get('/dashboard', DashboardController::class)->name('admin.dashboard');

    // User Controller
    Route::get('/users', [UserController::class, 'index'])->name('admin.user.index');
    Route::get('/user/{user}', [UserController::class, 'show'])->name('admin.user.show');
    Route::get('/user/{user}/edit', [UserController::class, 'edit'])->name('admin.user.edit');
    Route::put('/user/{user}', [UserController::class, 'update'])->name('admin.user.update');
    Route::delete('/user/{user}/delete', [UserController::class, 'delete'])->name('admin.user.delete');

    // User Account State Controller
    Route::get('/user/{user}/account/state', [UserAccountStateController::class, 'index'])->name('admin.user.account_state.index');

    // User KYC Controller
    Route::get('/user/{user}/kyc', [UserKycController::class, 'index'])->name('admin.user.kyc.index');

    // User Notification Controller
    Route::get('/user/{user}/notification', [UserNotificationController::class, 'index'])->name('admin.user.notification.index');
    Route::get('/user/{user}/notification/create', [UserNotificationController::class, 'create'])->name('admin.user.notification.create');
    Route::post('/user/{user}/notification/store', [UserNotificationController::class, 'store'])->name('admin.user.notification.store');
    Route::get('/user/{user}/notification/{notification}', [UserNotificationController::class, 'show'])->name('admin.user.notification.show');
    Route::delete('/user/{user}/notification/{notification}/delete', [UserNotificationController::class, 'delete'])->name('admin.user.notification.delete');
    Route::delete('/user/{user}/notification/delete/all', [UserNotificationController::class, 'deleteAll'])->name('admin.user.notification.delete_all');
});
