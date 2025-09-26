<?php

namespace App\Enum;

enum IRSTaxRefundStatus: string
{
    case Pending = 'pending';
    case Submitted = 'submitted';
    case Rejected = 'rejected';
    case Refunded = 'refunded';

    public function label(): string
    {
        return match ($this) {
            self::Pending => 'Pending',
            self::Submitted => 'Submitted',
            self::Rejected => 'Rejected',
            self::Refunded => 'Refunded',
        };
    }

    public function badge(): string
    {
        return match ($this) {
            self::Pending => 'badge bg-warning-subtle text-warning fs-12 p-1',
            self::Submitted => 'badge bg-info-subtle text-info fs-12 p-1',
            self::Rejected => 'badge bg-danger-subtle text-danger fs-12 p-1',
            self::Refunded => 'badge bg-success-subtle text-success fs-12 p-1',
        };
    }
}
