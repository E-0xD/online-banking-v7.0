<?php

namespace App\Enum;

enum DepositStatus: string
{
    case Pending = 'pending';
    case Approved = 'approved';
    case Rejected = 'rejected';

    public function label(): string
    {
        return match ($this) {
            self::Pending => 'Pending',
            self::Approved => 'Approved',
            self::Rejected => 'Rejected',
        };
    }

    public function badge(): string
    {
        return match ($this) {
            self::Pending => 'badge bg-warning-subtle text-warning fs-12 p-1',
            self::Approved => 'badge bg-success-subtle text-success fs-12 p-1',
            self::Rejected => 'badge bg-danger-subtle text-danger fs-12 p-1',
        };
    }
}
