<?php

namespace App\Enum;

enum LoanRepaymentStatus: string
{
    case Pending = 'pending';
    case Paid = 'paid';
    case Overdue = 'overdue';

    public function label()
    {
        return match ($this) {
            self::Pending => 'Pending',
            self::Paid => 'Paid',
            self::Overdue => 'Overdue',
        };
    }

    public function badge()
    {
        return match ($this) {
            self::Pending => 'badge bg-warning-subtle text-warning fs-12 p-1',
            self::Paid => 'badge bg-success-subtle text-success fs-12 p-1',
            self::Overdue => 'badge bg-danger-subtle text-danger fs-12 p-1',
        };
    }
}
