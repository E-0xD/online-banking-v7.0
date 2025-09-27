<?php

namespace App\Enum;

enum GrantCategoryStatus: string
{
    case Active = 'Active';
    case Inactive = 'Inactive';

    public function label()
    {
        return match ($this) {
            self::Active => 'Active',
            self::Inactive => 'Inactive',
        };
    }

    public function badge()
    {
        return match ($this) {
            self::Active => 'badge bg-success-subtle text-success fs-12 p-1',
            self::Inactive => 'badge bg-danger-subtle text-danger fs-12 p-1',
        };
    }
}
