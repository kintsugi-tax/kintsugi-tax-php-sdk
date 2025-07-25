<?php

/**
 * Code generated by Speakeasy (https://speakeasy.com). DO NOT EDIT.
 */

declare(strict_types=1);

namespace KintsugiTax\SDK\Models\Components;


/**
 * Our transaction state, used to determine when/if a transaction needs additional
 *
 * processing.
 */
enum ProcessingStatusEnum: string
{
    case New = 'NEW';
    case Updated = 'UPDATED';
    case Queued = 'QUEUED';
    case AddressDone = 'ADDRESS_DONE';
    case ExemptDone = 'EXEMPT_DONE';
    case NexusDone = 'NEXUS_DONE';
    case Processed = 'PROCESSED';
    case FilingStarted = 'FILING_STARTED';
    case FilingDone = 'FILING_DONE';
    case Locked = 'LOCKED';
    case Pending = 'PENDING';
    case Archived = 'ARCHIVED';
    case NeedsRefetch = 'NEEDS_REFETCH';
}
