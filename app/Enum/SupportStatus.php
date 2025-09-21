<?php

namespace App\Enum;

enum SupportStatus: string
{
    case New = 'New';
    case Open = 'Open';
    case InProgress = 'In Progress';
    case PendingCustomer = 'Pending Customer';
    case Escalated = 'Escalated';
    case Resolved = 'Resolved';
    case Closed = 'Closed';
        // Optional / Advanced States for Banks
    case AwaitingThirdParty = 'Awaiting Third Party';
    case ScheduledDeferred = 'Scheduled / Deferred';
    case Cancelled = 'Cancelled';
    case DuplicateMerged = 'Duplicate / Merged';
    case UnderReview = 'Under Review';

    /**
     * Get status descriptions.
     *
     * @return array<string, string>
     */
    public static function descriptions(): array
    {
        return [
            self::New->value => 'Ticket just created by a customer or staff.',
            self::Open->value => 'Acknowledged and under review by support.',
            self::InProgress->value => 'Actively being handled by the support or operations team.',
            self::PendingCustomer->value => 'Waiting for the customer to provide additional information or confirmation.',
            self::Escalated->value => 'Forwarded to a senior support agent or a specialized department (e.g., fraud, compliance).',
            self::Resolved->value => 'A solution has been provided; awaiting customer confirmation or automatic closure after a set period.',
            self::Closed->value => 'Fully completed, confirmed, and no further action required.',
            self::AwaitingThirdParty->value => 'Waiting on external entities (e.g., interbank networks or payment processors).',
            self::ScheduledDeferred->value => 'Action postponed for a specific date (e.g., planned transaction reversal).',
            self::Cancelled->value => 'Withdrawn by the customer or deemed unnecessary.',
            self::DuplicateMerged->value => 'Marked as a duplicate or merged with another related ticket.',
            self::UnderReview->value => 'Useful for compliance or fraud checks that may require special handling.',
        ];
    }
}
