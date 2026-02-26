<?php

namespace Vibedropper\Core\Exceptions;

class RateLimitException extends APIStatusException
{
    /** @var string */
    protected const DESC = 'Vibedropper Rate Limit Exception';
}
