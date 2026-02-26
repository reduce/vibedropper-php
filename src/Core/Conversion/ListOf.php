<?php

declare(strict_types=1);

namespace Vibedropper\Core\Conversion;

use Vibedropper\Core\Conversion\Concerns\ArrayOf;
use Vibedropper\Core\Conversion\Contracts\Converter;

/**
 * @internal
 */
final class ListOf implements Converter
{
    use ArrayOf;

    // @phpstan-ignore-next-line missingType.iterableValue
    private function empty(): array|object
    {
        return [];
    }
}
