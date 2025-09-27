<?php

namespace App\Models;

use App\Enum\WalletStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Wallet extends Model
{
    use HasFactory;


    protected $guarded = [];

    protected function casts(): array
    {
        return [
            'status' => WalletStatus::class,
        ];
    }
}
