<?php

namespace App\Models;

use App\Enum\CardStatus;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    protected $guarded = [];

    protected $casts = [
        'status' => CardStatus::class
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function noOfPendingCards()
    {
        return Card::where('status', 'pending')->count();
    }
}
