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
}
