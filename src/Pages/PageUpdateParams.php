<?php

declare(strict_types=1);

namespace Vibedropper\Pages;

use Vibedropper\Core\Attributes\Optional;
use Vibedropper\Core\Concerns\SdkModel;
use Vibedropper\Core\Concerns\SdkParams;
use Vibedropper\Core\Contracts\BaseModel;
use Vibedropper\Pages\PageUpdateParams\Status;

/**
 * Update a page.
 *
 * @see Vibedropper\Services\PagesService::update()
 *
 * @phpstan-type PageUpdateParamsShape = array{
 *   description?: string|null,
 *   name?: string|null,
 *   status?: null|Status|value-of<Status>,
 * }
 */
final class PageUpdateParams implements BaseModel
{
    /** @use SdkModel<PageUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Optional(nullable: true)]
    public ?string $description;

    #[Optional]
    public ?string $name;

    /** @var value-of<Status>|null $status */
    #[Optional(enum: Status::class)]
    public ?string $status;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Status|value-of<Status>|null $status
     */
    public static function with(
        ?string $description = null,
        ?string $name = null,
        Status|string|null $status = null,
    ): self {
        $self = new self;

        null !== $description && $self['description'] = $description;
        null !== $name && $self['name'] = $name;
        null !== $status && $self['status'] = $status;

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

    /**
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }
}
