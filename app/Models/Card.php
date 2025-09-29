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

    public function isPending()
    {
        return $this->status->value == CardStatus::Pending->value;
    }

    public function isApproved()
    {
        return $this->status->value == CardStatus::Approved->value;
    }

    public function isRejected()
    {
        return $this->status->value == CardStatus::Rejected->value;
    }

    public function isActive()
    {
        return $this->status->value == CardStatus::Active->value;
    }

    public function isBlocked()
    {
        return $this->status->value == CardStatus::Blocked->value;
    }

    public function isTypeVisa()
    {
        return $this->card_type == 'Visa';
    }

    public function isTypeMastercard()
    {
        return $this->card_type == 'Mastercard';
    }

    public function isTypeAmex()
    {
        return $this->card_type == 'American Express';
    }
}
