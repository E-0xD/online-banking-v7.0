<?php

namespace App\Models;

use App\Enum\TransactionType;
use App\Enum\TransactionStatus;
use App\Enum\TransactionDirection;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $guarded = [];

    protected $casts = [
        'status' => TransactionStatus::class,
        'direction' => TransactionDirection::class,
        'type' => TransactionType::class
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function isDirectionCredit()
    {
        return $this->direction->value == TransactionDirection::Credit->value;
    }

    public function isDirectionDebit()
    {
        return $this->direction->value == TransactionDirection::Debit->value;
    }

    public function isCompleted()
    {
        return $this->status->value == TransactionStatus::Completed->value;
    }

    public function isPending()
    {
        return $this->status->value == TransactionStatus::Pending->value;
    }

    public function isFailed()
    {
        return $this->status->value == TransactionStatus::Failed->value;
    }

    public function isCancelled()
    {
        return $this->status->value == TransactionStatus::Cancelled->value;
    }

    public function transfer()
    {
        return $this->belongsTo(Transfer::class, 'reference_id', 'reference_id');
    }

    public function loan()
    {
        return $this->belongsTo(Loan::class, 'reference_id', 'reference_id');
    }

    public function deposit()
    {
        return $this->belongsTo(Deposit::class, 'reference_id', 'reference_id');
    }

    public function card()
    {
        return $this->belongsTo(Card::class, 'reference_id', 'reference_id');
    }
}
