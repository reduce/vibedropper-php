<?php

declare(strict_types=1);

namespace Vibedropper\Pages\PageListParams;

/**
 * Filter by status. Omit or use "all" to return all pages.
 */
enum Status: string
{
    case DRAFT = 'DRAFT';

    case ACTIVE = 'ACTIVE';

    case ENDED = 'ENDED';

    case ARCHIVED = 'ARCHIVED';

    case ALL = 'all';
}
