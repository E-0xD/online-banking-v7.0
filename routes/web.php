<?php

use App\Http\Controllers\Frontend\AboutController;
use App\Http\Controllers\Frontend\AppController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\ServiceController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('home');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::get('/app', AppController::class)->name('app');
Route::prefix('services')->group(function () {
    Route::get('/personal_banking', [ServiceController::class, 'personalBanking'])->name('services.personal_banking');
    Route::get('/business_banking', [ServiceController::class, 'businessBanking'])->name('services.business_banking');
    Route::get('/loan_and_credit', [ServiceController::class, 'loanAndCredit'])->name('services.loan_and_credit');
    Route::get('/grant', [ServiceController::class, 'grant'])->name('services.grant');
});
