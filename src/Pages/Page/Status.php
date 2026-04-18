<?php

declare(strict_types=1);

namespace Vibedropper\Pages\Page;

enum Status: string
{
    case DRAFT = 'DRAFT';

    case ACTIVE = 'ACTIVE';

    case ENDED = 'ENDED';

    case ARCHIVED = 'ARCHIVED';
}
