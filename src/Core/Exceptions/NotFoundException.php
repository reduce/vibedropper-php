<?php

namespace Vibedropper\Core\Exceptions;

class NotFoundException extends APIStatusException
{
    /** @var string */
    protected const DESC = 'Vibedropper Not Found Exception';
}
