<?php

declare(strict_types=1);

namespace Vibedropper\Forms\Form;

enum Status: string
{
    case DRAFT = 'DRAFT';

    case ACTIVE = 'ACTIVE';

    case ARCHIVED = 'ARCHIVED';
}
