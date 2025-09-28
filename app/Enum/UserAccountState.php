<?php

namespace App\Enum;

enum UserAccountState: string
{
    case Active = 'Active';
    case Dormant = 'Dormant';
    case Restricted = 'Restricted';
    case Frozen = 'Frozen';
    case Closed = 'Closed';
    case PendingVerification = 'Pending Verification';
    case Suspended = 'Suspended';

    public function label(): string
    {
        return match ($this) {
            self::Active => 'Active',
            self::Dormant => 'Dormant',
            self::Restricted => 'Restricted',
            self::Frozen => 'Frozen',
            self::Closed => 'Closed',
            self::PendingVerification => 'Pending Verification',
            self::Suspended => 'Suspended',
        };
    }

    public function badge(): string
    {
        return match ($this) {
            self::Active => 'badge bg-success-subtle text-success fs-12 p-1',
            self::Dormant => 'badge bg-secondary-subtle text-secondary fs-12 p-1',
            self::Restricted => 'badge bg-warning-subtle text-warning fs-12 p-1',
            self::Frozen => 'badge bg-danger-subtle text-danger fs-12 p-1',
            self::Closed => 'badge bg-dark-subtle text-dark fs-12 p-1',
            self::PendingVerification => 'badge bg-info-subtle text-info fs-12 p-1',
            self::Suspended => 'badge bg-danger-subtle text-danger fs-12 p-1',
        };
    }

    public function description()
    {
        return match ($this) {
            self::Active => 'User can log in and perform all transactions.',
            self::Dormant => 'Limited access due to inactivity; reactivation required.',
            self::Restricted => 'User can view balance but cannot withdraw or transfer.',
            self::Frozen => 'Account locked for investigation; no transactions allowed.',
            self::Closed => 'Permanently shut down; user cannot log in.',
            self::PendingVerification => 'Awaiting KYC; no financial transactions allowed.',
            self::Suspended => 'Login disabled due to violations; may be reinstated or closed.',
        };
    }
}
