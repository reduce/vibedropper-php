<?php

namespace Vibedropper\Core\Exceptions;

class InternalServerException extends APIStatusException
{
    /** @var string */
    protected const DESC = 'Vibedropper Internal Server Exception';
}
