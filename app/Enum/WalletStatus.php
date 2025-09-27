<?php

namespace App\Enum;

enum WalletStatus: string
{
    case Active = 'Active';
    case Inactive = 'Inactive';
    case Archived = 'Archived';

    public function label(): string
    {
        return match ($this) {
            self::Active => 'Active',
            self::Inactive => 'Inactive',
            self::Archived => 'Archived',
        };
    }

    public function badge(): string
    {
        return match ($this) {
            self::Active => 'badge bg-success-subtle text-success fs-12 p-1',
            self::Inactive => 'badge bg-danger-subtle text-danger fs-12 p-1',
            self::Archived => 'badge bg-danger-subtle text-danger fs-12 p-1',
        };
    }
}
