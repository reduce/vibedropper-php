<?php

namespace Vibedropper\Core\Exceptions;

class AuthenticationException extends APIStatusException
{
    /** @var string */
    protected const DESC = 'Vibedropper Authentication Exception';
}
