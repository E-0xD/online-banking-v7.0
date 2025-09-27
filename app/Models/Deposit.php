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
}
