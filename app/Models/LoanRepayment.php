<?php

namespace App\Models;

use App\Enum\LoanRepaymentStatus;
use Illuminate\Database\Eloquent\Model;

class LoanRepayment extends Model
{
    protected $guarded = [];

    protected function casts()
    {
        return [
            'status' => LoanRepaymentStatus::class,
            'repaid_at' => 'date',
        ];
    }

    public function loan()
    {
        return $this->belongsTo(Loan::class);
    }

    public function isPending()
    {
        return $this->status->value == LoanRepaymentStatus::Pending->value;
    }

    public function isPaid()
    {
        return $this->status->value == LoanRepaymentStatus::Paid->value;
    }

    public function isOverdue()
    {
        return $this->status->value == LoanRepaymentStatus::Overdue->value;
    }
}
