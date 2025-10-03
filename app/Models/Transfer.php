<?php

namespace App\Models;

use App\Enum\TransferType;
use App\Enum\TransferStatus;
use Illuminate\Database\Eloquent\Model;

class Transfer extends Model
{
    protected $guarded = [];

    protected $casts = [
        'status' => TransferStatus::class,
        'transfer_type' => TransferType::class
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function isTypeInternational()
    {
        return $this->transfer_type->value === TransferType::International->value;
    }
}
