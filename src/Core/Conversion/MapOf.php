<?php

declare(strict_types=1);

namespace Vibedropper\Core\Conversion;

use Vibedropper\Core\Conversion\Concerns\ArrayOf;
use Vibedropper\Core\Conversion\Contracts\Converter;

/**
 * @internal
 */
final class MapOf implements Converter
{
    use ArrayOf;
}
