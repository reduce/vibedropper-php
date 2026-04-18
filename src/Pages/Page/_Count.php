<?php

declare(strict_types=1);

namespace Vibedropper\Pages\Page;

use Vibedropper\Core\Attributes\Optional;
use Vibedropper\Core\Concerns\SdkModel;
use Vibedropper\Core\Contracts\BaseModel;

/**
 * @phpstan-type _CountShape = array{items?: int|null}
 */
final class _Count implements BaseModel
{
    /** @use SdkModel<_CountShape> */
    use SdkModel;

    #[Optional]
    public ?int $items;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?int $items = null): self
    {
        $self = new self;

        null !== $items && $self['items'] = $items;

        return $self;
    }

    public function withItems(int $items): self
    {
        $self = clone $this;
        $self['items'] = $items;

        return $self;
    }
}
