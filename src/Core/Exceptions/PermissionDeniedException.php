<?php

namespace Vibedropper\Core\Exceptions;

class PermissionDeniedException extends APIStatusException
{
    /** @var string */
    protected const DESC = 'Vibedropper Permission Denied Exception';
}
