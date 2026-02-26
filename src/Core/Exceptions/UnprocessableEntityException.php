<?php

namespace Vibedropper\Core\Exceptions;

class UnprocessableEntityException extends APIStatusException
{
    /** @var string */
    protected const DESC = 'Vibedropper Unprocessable Entity Exception';
}
