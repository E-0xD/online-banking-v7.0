<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Enum\ShouldLocalTransferUseTransferCode;
use App\Enum\ShouldTransferFail;
use App\Enum\TwoFactorAuthenticationStatus;
use App\Enum\UserAccountState;
use App\Enum\UserKycStatus;
use App\Enum\UserStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    protected $guarded = [];

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'status' => UserStatus::class,
            'two_factor_authentication' => TwoFactorAuthenticationStatus::class,
            'last_login_time' => 'datetime',
            'kyc' => UserKycStatus::class,
            'account_state' => UserAccountState::class,
            'should_transfer_fail' => ShouldTransferFail::class,
            'should_local_transfer_use_transfer_code' => ShouldLocalTransferUseTransferCode::class
        ];
    }

    public function support()
    {
        return $this->hasMany(Support::class);
    }

    public function notification()
    {
        return $this->hasMany(Notification::class);
    }

    public function grantApplication()
    {
        return $this->hasMany(GrantApplication::class);
    }

    public function irsTaxRefund()
    {
        return $this->hasMany(IRSTaxRefund::class);
    }

    public function loan()
    {
        return $this->hasMany(Loan::class);
    }

    public function kycIsApproved()
    {
        return $this->kyc->value === UserKycStatus::Approved->value;
    }

    public function kycIsPendingAndHasDocument(): bool
    {
        if ($this->front_side != null && $this->back_side != null && $this->document_type != null && $this->kyc->value === UserKycStatus::Pending->value) {
            return true;
        }

        return false;
    }

    public function kycIsPendingAndHasNoDocument(): bool
    {
        if ($this->kyc->value === UserKycStatus::Pending->value) {
            return true;
        }

        return false;
    }

    public function kycIsRejected()
    {
        return $this->kyc->value === UserKycStatus::Rejected->value;
    }

    public function deposit()
    {
        return $this->hasMany(Deposit::class);
    }

    public function card()
    {
        return $this->hasMany(Card::class);
    }

    public function transaction()
    {
        return $this->hasMany(Transaction::class);
    }

    public function transfer()
    {
        return $this->hasMany(Transfer::class);
    }

    public function shouldTransferFail()
    {
        return $this->should_transfer_fail->value === ShouldTransferFail::Yes->value;
    }

    // 1. Per Transaction Limit
    public function exceedsTransactionLimit($amount)
    {
        return $amount > $this->account_limit;
    }

    // 2. Daily Limit
    public function exceedsDailyLimit()
    {
        $todayTotal = $this->transaction()
            ->whereDate('transaction_at', today())
            ->sum('amount');

        return $todayTotal >= $this->account_limit;
    }

    // 3. Monthly Limit
    public function exceedsMonthlyLimit()
    {
        $monthlyTotal = $this->transaction()
            ->whereMonth('transaction_at', now()->month)
            ->whereYear('transaction_at', now()->year)
            ->sum('amount');

        return $monthlyTotal >= $this->account_limit;
    }

    // 4. Combined (Transaction + Daily)
    public function exceedsCombinedLimit($amount)
    {
        $todayTotal = $this->transaction()
            ->whereDate('transaction_at', today())
            ->sum('amount');

        return $amount > $this->account_limit || ($todayTotal + $amount) > $this->account_limit;
    }

    public function exceedsAccountCapacity($amount)
    {
        // Calculate new balance if this amount is added
        $newBalance = $this->account_balance + $amount;

        return $newBalance > $this->account_limit;
    }

    public function shouldLocalTransferUseTransferCode()
    {
        return $this->should_local_transfer_use_transfer_code->value === ShouldLocalTransferUseTransferCode::Yes->value;
    }
}
