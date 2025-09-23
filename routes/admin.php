<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\Admin\UserController;
use App\Http\Controllers\Dashboard\Admin\DashboardController;
use App\Http\Controllers\Dashboard\Admin\UserAccountStateController;

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
    Route::patch('/user/{user}/account/state', [UserAccountStateController::class, 'update'])->name('admin.user.account_state.update');
});
