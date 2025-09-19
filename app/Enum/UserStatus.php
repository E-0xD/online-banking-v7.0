<?php

namespace App\Enum;

enum UserStatus: int
{
    case ACTIVE = 1;
    case INACTIVE = 0;

    public function label(): string
    {
        return match ($this) {
            self::ACTIVE => 'Active',
            self::INACTIVE => 'Inactive',
        };
    }

    public function badge(): string
    {
        return match ($this) {
            self::ACTIVE => 'badge bg-success-subtle text-success fs-12 p-1',
            self::INACTIVE => 'badge bg-danger-subtle text-danger fs-12 p-1',
        };
    }
}
