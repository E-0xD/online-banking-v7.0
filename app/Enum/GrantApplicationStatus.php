<?php

namespace App\Enum;

enum GrantApplicationStatus: string
{
    case Pending = 'Pending';
    case Approved = 'Approved';
    case Rejected = 'Rejected';
    case Withdrawn = 'Withdrawn';

    public function label(): string
    {
        return match ($this) {
            self::Pending => 'Pending',
            self::Approved => 'Approved',
            self::Rejected => 'Rejected',
            self::Withdrawn => 'Withdrawn',
        };
    }

    public function badge()
    {
        return match ($this) {
            self::Pending => 'badge bg-warning-subtle text-warning fs-12 p-1',
            self::Approved => 'badge bg-success-subtle text-success fs-12 p-1',
            self::Rejected => 'badge bg-danger-subtle text-danger fs-12 p-1',
            self::Withdrawn => 'badge bg-danger-subtle text-danger fs-12 p-1',
        };
    }
}
