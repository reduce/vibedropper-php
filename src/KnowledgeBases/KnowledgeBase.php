<?php

declare(strict_types=1);

namespace Vibedropper\KnowledgeBases;

use Vibedropper\Core\Attributes\Optional;
use Vibedropper\Core\Concerns\SdkModel;
use Vibedropper\Core\Contracts\BaseModel;
use Vibedropper\KnowledgeBases\KnowledgeBase\_Count;

/**
 * @phpstan-import-type _CountShape from \Vibedropper\KnowledgeBases\KnowledgeBase\_Count
 *
 * @phpstan-type KnowledgeBaseShape = array{
 *   id?: string|null,
 *   _count?: null|_Count|_CountShape,
 *   createdAt?: \DateTimeInterface|null,
 *   description?: string|null,
 *   name?: string|null,
 *   orgID?: string|null,
 *   slug?: string|null,
 *   sortOrder?: int|null,
 *   updatedAt?: \DateTimeInterface|null,
 * }
 */
final class KnowledgeBase implements BaseModel
{
    /** @use SdkModel<KnowledgeBaseShape> */
    use SdkModel;

    #[Optional]
    public ?string $id;

    #[Optional]
    public ?_Count $_count;

    #[Optional]
    public ?\DateTimeInterface $createdAt;

    #[Optional(nullable: true)]
    public ?string $description;

    #[Optional]
    public ?string $name;

    #[Optional('orgId')]
    public ?string $orgID;

    #[Optional]
    public ?string $slug;

    #[Optional]
    public ?int $sortOrder;

    #[Optional]
    public ?\DateTimeInterface $updatedAt;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param _Count|_CountShape|null $_count
     */
    public static function with(
        ?string $id = null,
        _Count|array|null $_count = null,
        ?\DateTimeInterface $createdAt = null,
        ?string $description = null,
        ?string $name = null,
        ?string $orgID = null,
        ?string $slug = null,
        ?int $sortOrder = null,
        ?\DateTimeInterface $updatedAt = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $_count && $self['_count'] = $_count;
        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $description && $self['description'] = $description;
        null !== $name && $self['name'] = $name;
        null !== $orgID && $self['orgID'] = $orgID;
        null !== $slug && $self['slug'] = $slug;
        null !== $sortOrder && $self['sortOrder'] = $sortOrder;
        null !== $updatedAt && $self['updatedAt'] = $updatedAt;

        return $self;
    }

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * @param _Count|_CountShape $_count
     */
    public function withCount(_Count|array $_count): self
    {
        $self = clone $this;
        $self['_count'] = $_count;

        return $self;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

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

    public function withOrgID(string $orgID): self
    {
        $self = clone $this;
        $self['orgID'] = $orgID;

        return $self;
    }

    public function withSlug(string $slug): self
    {
        $self = clone $this;
        $self['slug'] = $slug;

        return $self;
    }

    public function withSortOrder(int $sortOrder): self
    {
        $self = clone $this;
        $self['sortOrder'] = $sortOrder;

        return $self;
    }

    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }
}
