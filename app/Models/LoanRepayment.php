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
            'status' => LoanRepaymentStatus::class
        ];
    }

    public function loan()
    {
        return $this->belongsTo(Loan::class);
    }
}
