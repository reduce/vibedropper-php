<?php

declare(strict_types=1);

namespace Vibedropper\Core\Conversion\Contracts;

use Vibedropper\Core\Conversion\CoerceState;
use Vibedropper\Core\Conversion\DumpState;

/**
 * @internal
 */
interface Converter
{
    /**
     * @internal
     */
    public function coerce(mixed $value, CoerceState $state): mixed;

    /**
     * @internal
     */
    public function dump(mixed $value, DumpState $state): mixed;
}
