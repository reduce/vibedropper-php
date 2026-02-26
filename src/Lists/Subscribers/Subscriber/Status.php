<?php

declare(strict_types=1);

namespace Vibedropper\Lists\Subscribers\Subscriber;

enum Status: string
{
    case SUBSCRIBED = 'SUBSCRIBED';

    case UNSUBSCRIBED = 'UNSUBSCRIBED';

    case PENDING = 'PENDING';

    case BOUNCED = 'BOUNCED';
}
