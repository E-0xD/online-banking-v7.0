<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\Master\AdminController;
use App\Http\Controllers\Dashboard\Master\DashboardController;

Route::middleware('master')->prefix('master')->group(function () {
    Route::get('/dashboard', DashboardController::class)->name('master.dashboard');

    Route::get('/admins', [AdminController::class, 'index'])->name('master.admin.index');
    Route::get('/admin/{admin}', [AdminController::class, 'show'])->name('master.admin.show');
    Route::get('/admin/{admin}/edit', [AdminController::class, 'edit'])->name('master.admin.edit');
    Route::put('/admin/{admin}', [AdminController::class, 'update'])->name('master.admin.update');
});
