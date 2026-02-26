<?php

namespace Vibedropper\Core\Exceptions;

class ConflictException extends APIStatusException
{
    /** @var string */
    protected const DESC = 'Vibedropper Conflict Exception';
}
