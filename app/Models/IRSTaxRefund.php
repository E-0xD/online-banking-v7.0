<?php

namespace App\Models;

use App\Enum\IRSTaxRefundStatus;
use Illuminate\Database\Eloquent\Model;

class IRSTaxRefund extends Model
{
    protected $guarded = [];

    protected function casts()
    {
        return [
            'status' => IRSTaxRefundStatus::class
        ];
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function isPending()
    {
        return $this->status->value == IRSTaxRefundStatus::Pending->value;
    }

    public function isSubmitted()
    {
        return $this->status->value == IRSTaxRefundStatus::Submitted->value;
    }

    public function isRejected()
    {
        return $this->status->value == IRSTaxRefundStatus::Rejected->value;
    }

    public function isRefunded()
    {
        return $this->status->value == IRSTaxRefundStatus::Refunded->value;
    }
}
