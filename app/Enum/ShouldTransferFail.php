<?php

namespace App\Enum;

enum ShouldTransferFail: string
{
    case Yes = 'Yes';
    case No = 'No';

    public function label()
    {
        return match ($this) {
            self::No => 'No',
            self::Yes => 'Yes',
        };
    }

    public function badge()
    {
        return match ($this) {
            self::No => 'badge bg-success-subtle text-success fs-12 p-1',
            self::Yes => 'badge bg-danger-subtle text-danger fs-12 p-1',
        };
    }
}
