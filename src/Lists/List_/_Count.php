<?php

declare(strict_types=1);

namespace Vibedropper\Lists\List_;

use Vibedropper\Core\Attributes\Optional;
use Vibedropper\Core\Concerns\SdkModel;
use Vibedropper\Core\Contracts\BaseModel;

/**
 * @phpstan-type _CountShape = array{subscribers?: int|null}
 */
final class _Count implements BaseModel
{
    /** @use SdkModel<_CountShape> */
    use SdkModel;

    #[Optional]
    public ?int $subscribers;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?int $subscribers = null): self
    {
        $self = new self;

        null !== $subscribers && $self['subscribers'] = $subscribers;

        return $self;
    }

    public function withSubscribers(int $subscribers): self
    {
        $self = clone $this;
        $self['subscribers'] = $subscribers;

        return $self;
    }
}
