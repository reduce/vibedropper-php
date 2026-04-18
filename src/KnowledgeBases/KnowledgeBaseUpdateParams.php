<?php

declare(strict_types=1);

namespace Vibedropper\KnowledgeBases;

use Vibedropper\Core\Attributes\Optional;
use Vibedropper\Core\Concerns\SdkModel;
use Vibedropper\Core\Concerns\SdkParams;
use Vibedropper\Core\Contracts\BaseModel;

/**
 * Update a knowledge base.
 *
 * @see Vibedropper\Services\KnowledgeBasesService::update()
 *
 * @phpstan-type KnowledgeBaseUpdateParamsShape = array{
 *   description?: string|null, name?: string|null, sortOrder?: int|null
 * }
 */
final class KnowledgeBaseUpdateParams implements BaseModel
{
    /** @use SdkModel<KnowledgeBaseUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Optional(nullable: true)]
    public ?string $description;

    #[Optional]
    public ?string $name;

    #[Optional]
    public ?int $sortOrder;

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
        ?string $description = null,
        ?string $name = null,
        ?int $sortOrder = null
    ): self {
        $self = new self;

        null !== $description && $self['description'] = $description;
        null !== $name && $self['name'] = $name;
        null !== $sortOrder && $self['sortOrder'] = $sortOrder;

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

    public function withSortOrder(int $sortOrder): self
    {
        $self = clone $this;
        $self['sortOrder'] = $sortOrder;

        return $self;
    }
}
