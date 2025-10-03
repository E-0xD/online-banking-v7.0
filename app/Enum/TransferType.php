<?php

namespace App\Enum;

enum TransferType: string
{
    case Local = 'local';
    case International = 'international';

    public function fullLabel()
    {
        return match ($this) {
            self::Local => 'Local Transfer',
            self::International => 'International Transfer',
        };
    }

    public function label()
    {
        return match ($this) {
            self::Local => 'Local',
            self::International => 'International',
        };
    }

    public function badge()
    {
        return match ($this) {
            self::Local => 'badge bg-primary-subtle text-primary fs-12 p-1',
            self::International => 'badge bg-info-subtle text-info fs-12 p-1',
        };
    }
}
