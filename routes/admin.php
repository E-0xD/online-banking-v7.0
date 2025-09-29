<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\Admin\UserController;
use App\Http\Controllers\Dashboard\Admin\WalletController;
use App\Http\Controllers\Dashboard\Admin\SettingController;
use App\Http\Controllers\Dashboard\Admin\UserKycController;
use App\Http\Controllers\Dashboard\Admin\UserCardController;
use App\Http\Controllers\Dashboard\Admin\UserLoanController;
use App\Http\Controllers\Dashboard\Admin\DashboardController;
use App\Http\Controllers\Dashboard\Admin\UserDepositController;
use App\Http\Controllers\Dashboard\Admin\UserSupportController;
use App\Http\Controllers\Dashboard\Admin\GrantCategoryController;
use App\Http\Controllers\Dashboard\Admin\UserAccountStateController;
use App\Http\Controllers\Dashboard\Admin\UserIRSTaxRefundController;
use App\Http\Controllers\Dashboard\Admin\UserNotificationController;
use App\Http\Controllers\Dashboard\Admin\VerificationCodeController;
use App\Http\Controllers\Dashboard\Admin\UserGrantApplicationController;

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
    Route::patch('/user/{user}/account/state/store', [UserAccountStateController::class, 'store'])->name('admin.user.account_state.store');

    // User KYC Controller
    Route::get('/user/{user}/kyc', [UserKycController::class, 'index'])->name('admin.user.kyc.index');
    Route::patch('/user/{user}/kyc/approve', [UserKycController::class, 'approve'])->name('admin.user.kyc.approve');
    Route::patch('/user/{user}/kyc/reject', [UserKycController::class, 'reject'])->name('admin.user.kyc.reject');

    // User Notification Controller
    Route::get('/user/{user}/notification', [UserNotificationController::class, 'index'])->name('admin.user.notification.index');
    Route::get('/user/{user}/notification/create', [UserNotificationController::class, 'create'])->name('admin.user.notification.create');
    Route::post('/user/{user}/notification/store', [UserNotificationController::class, 'store'])->name('admin.user.notification.store');
    Route::get('/user/{user}/notification/{notification}', [UserNotificationController::class, 'show'])->name('admin.user.notification.show');
    Route::delete('/user/{user}/notification/{notification}/delete', [UserNotificationController::class, 'delete'])->name('admin.user.notification.delete');
    Route::delete('/user/{user}/notification/delete/all', [UserNotificationController::class, 'deleteAll'])->name('admin.user.notification.delete_all');

    // User Support Controller
    Route::get('/user/{user}/support', [UserSupportController::class, 'index'])->name('admin.user.support.index');
    Route::get('/user/{user}/support/{support}', [UserSupportController::class, 'show'])->name('admin.user.support.show');
    Route::post('/user/{user}/support/{support}/store', [UserSupportController::class, 'store'])->name('admin.user.support.store');
    Route::delete('/user/{user}/support/{support}/delete', [UserSupportController::class, 'delete'])->name('admin.user.support.delete');

    // Verification Code Controller
    Route::get('/verification/codes', [VerificationCodeController::class, 'index'])->name('admin.verification_code.index');
    Route::get('/verification/code/create', [VerificationCodeController::class, 'create'])->name('admin.verification_code.create');
    Route::post('/verification/code/store', [VerificationCodeController::class, 'store'])->name('admin.verification_code.store');
    Route::get('/verification/code/{verificationCode}', [VerificationCodeController::class, 'show'])->name('admin.verification_code.show');
    Route::get('/verification/code/{verificationCode}/edit', [VerificationCodeController::class, 'edit'])->name('admin.verification_code.edit');
    Route::put('/verification/code/{verificationCode}', [VerificationCodeController::class, 'update'])->name('admin.verification_code.update');
    Route::delete('/verification/code/{verificationCode}/delete', [VerificationCodeController::class, 'delete'])->name('admin.verification_code.delete');

    // Setting Controller
    Route::get('/setting', [SettingController::class, 'index'])->name('admin.setting.index');

    // Wallet Controller
    Route::resource('wallet', WalletController::class)->names([
        'index' => 'admin.wallet.index',
        'create' => 'admin.wallet.create',
        'store' => 'admin.wallet.store',
        'show' => 'admin.wallet.show',
        'edit' => 'admin.wallet.edit',
        'update' => 'admin.wallet.update',
        'destroy' => 'admin.wallet.delete',
    ]);

    // Grant Category Controller
    Route::resource('grant_category', GrantCategoryController::class)->names([
        'index' => 'admin.grant_category.index',
        'create' => 'admin.grant_category.create',
        'store' => 'admin.grant_category.store',
        'show' => 'admin.grant_category.show',
        'edit' => 'admin.grant_category.edit',
        'update' => 'admin.grant_category.update',
        'destroy' => 'admin.grant_category.delete',
    ]);

    // User Grant Application Controller
    Route::get('/user/{user}/grant_application', [UserGrantApplicationController::class, 'index'])->name('admin.user.grant_application.index');
    Route::get('/user/{user}/grant_application/{grantApplication}', [UserGrantApplicationController::class, 'show'])->name('admin.user.grant_application.show');
    Route::patch('/user/{user}/grant_application/{grantApplication}/update', [UserGrantApplicationController::class, 'update'])->name('admin.user.grant_application.update');
    Route::delete('/user/{user}/grant_application/{grantApplication}/delete', [UserGrantApplicationController::class, 'delete'])->name('admin.user.grant_application.delete');

    // User IRS Tax Refund Controller
    Route::get('/user/{user}/irs_tax_refund', [UserIRSTaxRefundController::class, 'index'])->name('admin.user.irs_tax_refund.index');
    Route::get('/user/{user}/irs_tax_refund/{irsTaxRefund}', [UserIRSTaxRefundController::class, 'show'])->name('admin.user.irs_tax_refund.show');
    Route::patch('/user/{user}/irs_tax_refund/{irsTaxRefund}/update', [UserIRSTaxRefundController::class, 'update'])->name('admin.user.irs_tax_refund.update');
    Route::delete('/user/{user}/irs_tax_refund/{irsTaxRefund}/delete', [UserIRSTaxRefundController::class, 'delete'])->name('admin.user.irs_tax_refund.delete');

    // User Loan Controller
    Route::get('/user/{user}/loan', [UserLoanController::class, 'index'])->name('admin.user.loan.index');
    Route::get('/user/{user}/loan/{loan}', [UserLoanController::class, 'show'])->name('admin.user.loan.show');
    Route::patch('/user/{user}/loan/{loan}/approve', [UserLoanController::class, 'approve'])->name('admin.user.loan.approve');
    Route::patch('/user/{user}/loan/{loan}/reject', [UserLoanController::class, 'reject'])->name('admin.user.loan.reject');
    Route::post('/user/{user}/loan/{loan}/disburse', [UserLoanController::class, 'disburse'])->name('admin.user.loan.disburse');
    Route::delete('/user/{user}/loan/{loan}/delete', [UserLoanController::class, 'delete'])->name('admin.user.loan.delete');

    // User Deposit Controller
    Route::get('/user/{user}/deposit', [UserDepositController::class, 'index'])->name('admin.user.deposit.index');
    Route::get('/user/{user}/deposit/{deposit}', [UserDepositController::class, 'show'])->name('admin.user.deposit.show');
    Route::patch('/user/{user}/deposit/{deposit}/update', [UserDepositController::class, 'update'])->name('admin.user.deposit.update');
    Route::delete('/user/{user}/deposit/{deposit}/delete', [UserDepositController::class, 'delete'])->name('admin.user.deposit.delete');

    // User Card Controller
    Route::get('/user/{user}/card', [UserCardController::class, 'index'])->name('admin.user.card.index');
    Route::get('/user/{user}/card/{card}', [UserCardController::class, 'show'])->name('admin.user.card.show');
    Route::patch('/user/{user}/card/{card}/update', [UserCardController::class, 'update'])->name('admin.user.card.update');
    Route::delete('/user/{user}/card/{card}/delete', [UserCardController::class, 'delete'])->name('admin.user.card.delete');
});
