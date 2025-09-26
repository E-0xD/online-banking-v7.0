<?php

namespace App\Enum;

enum LoanStatus: string
{
    case Pending = 'pending';
    case Approved = 'approved';
    case Rejected = 'rejected';
    case Disbursed = 'disbursed';

    public function label(): string
    {
        return match ($this) {
            self::Pending => 'Pending',
            self::Approved => 'Approved',
            self::Rejected => 'Rejected',
            self::Disbursed => 'Disbursed',
        };
    }

    public function badge()
    {
        return match ($this) {
            self::Pending => 'badge bg-warning-subtle text-warning fs-12 p-1',
            self::Approved => 'badge bg-success-subtle text-success fs-12 p-1',
            self::Rejected => 'badge bg-danger-subtle text-danger fs-12 p-1',
            self::Disbursed => 'badge bg-info-subtle text-info fs-12 p-1',
        };
    }
}
