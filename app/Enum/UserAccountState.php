<?php

namespace App\Enum;

enum UserAccountState: string
{
    case Active = 'Active';
    case Disabled = 'Disabled';
    case Kyc = 'Kyc';
    case Frozen = 'Frozen';

    public function label()
    {
        return match ($this) {
            self::Active => 'Active',
            self::Disabled => 'Disabled',
            self::Kyc => 'Kyc',
            self::Frozen => 'Frozen',
        };
    }

    public function badge()
    {
        return match ($this) {
            self::Active => 'badge bg-success-subtle text-success fs-12 p-1',
            self::Disabled => 'badge bg-danger-subtle text-danger fs-12 p-1',
            self::Kyc => 'badge bg-warning-subtle text-warning fs-12 p-1',
            self::Frozen => 'badge bg-danger-subtle text-danger fs-12 p-1',
        };
    }
}
