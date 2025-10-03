<?php

namespace App\Enum;

enum TransferStatus: string
{
    case Pending = 'pending';
    case Processing = 'processing';
    case Completed = 'completed';
    case Cancelled = 'cancelled';
    case Failed = 'failed';

    public function label()
    {
        return match ($this) {
            self::Pending => 'Pending',
            self::Processing => 'Processing',
            self::Completed => 'Completed',
            self::Cancelled => 'Cancelled',
            self::Failed => 'Failed',
        };
    }

    public function badge()
    {
        return match ($this) {
            self::Pending => 'badge bg-warning-subtle text-warning fs-12 p-1',
            self::Processing => 'badge bg-info-subtle text-info fs-12 p-1',
            self::Completed => 'badge bg-success-subtle text-success fs-12 p-1',
            self::Cancelled => 'badge bg-danger-subtle text-danger fs-12 p-1',
            self::Failed => 'badge bg-danger-subtle text-danger fs-12 p-1',
        };
    }
}
