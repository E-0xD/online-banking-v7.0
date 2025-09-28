<?php

namespace App\Enum;

enum GrantApplicationType: string
{
    case Individual = 'Individual';
    case Company = 'Company';

    public function label(): string
    {
        return match ($this) {
            self::Individual => 'Individual',
            self::Company => 'Company',
        };
    }

    public function badge()
    {
        return match ($this) {
            self::Individual => 'badge bg-warning-subtle text-warning fs-12 p-1',
            self::Company => 'badge bg-success-subtle text-success fs-12 p-1',
        };
    }
}
