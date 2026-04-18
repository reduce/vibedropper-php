<?php

declare(strict_types=1);

namespace Vibedropper\Customers\Customer;

use Vibedropper\Core\Attributes\Optional;
use Vibedropper\Core\Concerns\SdkModel;
use Vibedropper\Core\Contracts\BaseModel;

/**
 * @phpstan-type ListShape = array{id?: string|null, name?: string|null}
 */
final class List_ implements BaseModel
{
    /** @use SdkModel<ListShape> */
    use SdkModel;

    #[Optional]
    public ?string $id;

    #[Optional]
    public ?string $name;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?string $id = null, ?string $name = null): self
    {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $name && $self['name'] = $name;

        return $self;
    }

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }
}
