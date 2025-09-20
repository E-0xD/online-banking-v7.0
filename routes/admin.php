<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\Admin\DashboardController;

Route::middleware('admin')->prefix('admin')->group(function () {
    Route::get('/dashboard', DashboardController::class)->name('user.dashboard');
});
