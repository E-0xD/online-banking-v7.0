<?php

namespace App\Enum;

enum TwoFactorAuthenticationStatus: int
{
    case ENABLED = 1;
    case DISABLED = 0;

    public function label(): string
    {
        return match ($this) {
            self::ENABLED => 'Enabled',
            self::DISABLED => 'Disabled',
        };
    }

    public function badge(): string
    {
        return match ($this) {
            self::ENABLED => 'badge bg-success-subtle text-success fs-12 p-1',
            self::DISABLED => 'badge bg-danger-subtle text-danger fs-12 p-1',
        };
    }

    public function checkBadge(): string
    {
        return match ($this) {
            self::ENABLED => '<span class="badge bg-success me-3"> On </span>',
            self::DISABLED => '<span class="badge bg-danger me-3"> Off </span>',
        };
    }
}
