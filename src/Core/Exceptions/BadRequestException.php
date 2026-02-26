<?php

namespace Vibedropper\Core\Exceptions;

class BadRequestException extends APIStatusException
{
    /** @var string */
    protected const DESC = 'Vibedropper Bad Request Exception';
}
