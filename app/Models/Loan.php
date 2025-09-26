<?php

namespace App\Models;

use App\Enum\LoanStatus;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    protected $guarded = [];

    protected function casts()
    {
        return [
            'status' => LoanStatus::class,
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function loanRepayment()
    {
        return $this->hasMany(LoanRepayment::class);
    }

    public function isPending()
    {
        return $this->status->value == LoanStatus::Pending->value;
    }

    public function isApproved()
    {
        return $this->status->value == LoanStatus::Approved->value;
    }
}
