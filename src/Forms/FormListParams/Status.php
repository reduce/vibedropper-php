<?php

declare(strict_types=1);

namespace Vibedropper\Forms\FormListParams;

/**
 * Filter by status. Omit or use "all" to return all forms.
 */
enum Status: string
{
    case DRAFT = 'DRAFT';

    case ACTIVE = 'ACTIVE';

    case ARCHIVED = 'ARCHIVED';

    case ALL = 'all';
}
