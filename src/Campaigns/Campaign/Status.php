<?php

declare(strict_types=1);

namespace Vibedropper\Campaigns\Campaign;

enum Status: string
{
    case DRAFT = 'DRAFT';

    case SCHEDULED = 'SCHEDULED';

    case SENDING = 'SENDING';

    case SENT = 'SENT';
}
