<?php

namespace App\Enum;

enum CardStatus: string
{
    case Pending = 'pending';
    case Approved = 'approved';
    case Rejected = 'rejected';
    case Active = 'active';
    case Blocked = 'blocked';

    public function label()
    {
        return match ($this) {
            self::Pending => 'Pending',
            self::Approved => 'Approved',
            self::Rejected => 'Rejected',
            self::Active => 'Active',
            self::Blocked => 'Blocked',
        };
    }

    public function badge()
    {
        return match ($this) {
            self::Pending => 'badge bg-warning-subtle text-warning fs-12 p-1',
            self::Approved => 'badge bg-success-subtle text-success fs-12 p-1',
            self::Rejected => 'badge bg-danger-subtle text-danger fs-12 p-1',
            self::Active => 'badge bg-success-subtle text-success fs-12 p-1',
            self::Blocked => 'badge bg-danger-subtle text-danger fs-12 p-1',
        };
    }
}
