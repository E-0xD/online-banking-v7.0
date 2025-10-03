<?php

use App\Http\Controllers\Dashboard\TransactionReceiptController;
use App\Http\Controllers\Frontend\AboutController;
use App\Http\Controllers\Frontend\AppController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\PrivacyPolicyController;
use App\Http\Controllers\Frontend\ServiceController;
use App\Http\Controllers\Frontend\TermOfServiceController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('home');

Route::get('/about', [AboutController::class, 'index'])->name('about');

Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'store']);

Route::get('/app', AppController::class)->name('app');

Route::get('/privacy-policy', PrivacyPolicyController::class)->name('privacy_policy');

Route::get('/term-of-service', TermOfServiceController::class)->name('term_of_service');

Route::prefix('services')->group(function () {
    Route::get('/personal-banking', [ServiceController::class, 'personalBanking'])->name('services.personal_banking');
    Route::get('/business-banking', [ServiceController::class, 'businessBanking'])->name('services.business_banking');
    Route::get('/loan-and-credit', [ServiceController::class, 'loanAndCredit'])->name('services.loan_and_credit');
    Route::get('/grant', [ServiceController::class, 'grant'])->name('services.grant');
});

Route::middleware('auth')->get('/transaction/{transaction}/receipt/{user}', [TransactionReceiptController::class, 'index'])->name('transaction.receipt');

require __DIR__ . '/auth.php';
require __DIR__ . '/master.php';
require __DIR__ . '/user.php';
require __DIR__ . '/admin.php';
