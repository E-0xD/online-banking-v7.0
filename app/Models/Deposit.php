<?php

namespace App\Models;

use App\Enum\DepositStatus;
use Illuminate\Database\Eloquent\Model;

class Deposit extends Model
{
    protected $guarded = [];

    protected function casts()
    {
        return [
            'status' => DepositStatus::class
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function isBitcoinMethod()
    {
        return $this->method == 'Bitcoin';
    }

    public function isPayPalMethod()
    {
        return $this->method == 'Paypal';
    }

    public function isBankTransferMethod()
    {
        return $this->method == 'Bank Transfer';
    }

    public function isCreditCardMethod()
    {
        return $this->method == 'Credit Card';
    }
}
