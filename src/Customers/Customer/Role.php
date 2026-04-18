<?php

declare(strict_types=1);

namespace Vibedropper\Customers\Customer;

use Vibedropper\Core\Attributes\Optional;
use Vibedropper\Core\Concerns\SdkModel;
use Vibedropper\Core\Contracts\BaseModel;

/**
 * @phpstan-type RoleShape = array{
 *   id?: string|null,
 *   color?: string|null,
 *   description?: string|null,
 *   name?: string|null,
 * }
 */
final class Role implements BaseModel
{
    /** @use SdkModel<RoleShape> */
    use SdkModel;

    #[Optional]
    public ?string $id;

    #[Optional(nullable: true)]
    public ?string $color;

    #[Optional(nullable: true)]
    public ?string $description;

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
    public static function with(
        ?string $id = null,
        ?string $color = null,
        ?string $description = null,
        ?string $name = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $color && $self['color'] = $color;
        null !== $description && $self['description'] = $description;
        null !== $name && $self['name'] = $name;

        return $self;
    }

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    public function withColor(?string $color): self
    {
        $self = clone $this;
        $self['color'] = $color;

        return $self;
    }

    public function withDescription(?string $description): self
    {
        $self = clone $this;
        $self['description'] = $description;

        return $self;
    }

    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }
}
