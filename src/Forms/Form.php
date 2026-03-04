<?php

declare(strict_types=1);

namespace Vibedropper\Forms;

use Vibedropper\Core\Attributes\Optional;
use Vibedropper\Core\Concerns\SdkModel;
use Vibedropper\Core\Contracts\BaseModel;
use Vibedropper\Forms\Form\_Count;
use Vibedropper\Forms\Form\Status;

/**
 * @phpstan-import-type _CountShape from \Vibedropper\Forms\Form\_Count
 *
 * @phpstan-type FormShape = array{
 *   id?: string|null,
 *   _count?: null|_Count|_CountShape,
 *   createdAt?: \DateTimeInterface|null,
 *   description?: string|null,
 *   listID?: string|null,
 *   orgID?: string|null,
 *   slug?: string|null,
 *   status?: null|Status|value-of<Status>,
 *   storeBlocks?: list<mixed>|null,
 *   successMessage?: string|null,
 *   title?: string|null,
 *   updatedAt?: \DateTimeInterface|null,
 * }
 */
final class Form implements BaseModel
{
    /** @use SdkModel<FormShape> */
    use SdkModel;

    #[Optional]
    public ?string $id;

    #[Optional]
    public ?_Count $_count;

    #[Optional]
    public ?\DateTimeInterface $createdAt;

    #[Optional(nullable: true)]
    public ?string $description;

    #[Optional('listId', nullable: true)]
    public ?string $listID;

    #[Optional('orgId')]
    public ?string $orgID;

    #[Optional]
    public ?string $slug;

    /** @var value-of<Status>|null $status */
    #[Optional(enum: Status::class)]
    public ?string $status;

    /** @var list<mixed>|null $storeBlocks */
    #[Optional(list: 'mixed', nullable: true)]
    public ?array $storeBlocks;

    #[Optional(nullable: true)]
    public ?string $successMessage;

    #[Optional]
    public ?string $title;

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
     * @param Status|value-of<Status>|null $status
     * @param list<mixed>|null $storeBlocks
     */
    public static function with(
        ?string $id = null,
        _Count|array|null $_count = null,
        ?\DateTimeInterface $createdAt = null,
        ?string $description = null,
        ?string $listID = null,
        ?string $orgID = null,
        ?string $slug = null,
        Status|string|null $status = null,
        ?array $storeBlocks = null,
        ?string $successMessage = null,
        ?string $title = null,
        ?\DateTimeInterface $updatedAt = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $_count && $self['_count'] = $_count;
        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $description && $self['description'] = $description;
        null !== $listID && $self['listID'] = $listID;
        null !== $orgID && $self['orgID'] = $orgID;
        null !== $slug && $self['slug'] = $slug;
        null !== $status && $self['status'] = $status;
        null !== $storeBlocks && $self['storeBlocks'] = $storeBlocks;
        null !== $successMessage && $self['successMessage'] = $successMessage;
        null !== $title && $self['title'] = $title;
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

    public function withListID(?string $listID): self
    {
        $self = clone $this;
        $self['listID'] = $listID;

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

    /**
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }

    /**
     * @param list<mixed>|null $storeBlocks
     */
    public function withStoreBlocks(?array $storeBlocks): self
    {
        $self = clone $this;
        $self['storeBlocks'] = $storeBlocks;

        return $self;
    }

    public function withSuccessMessage(?string $successMessage): self
    {
        $self = clone $this;
        $self['successMessage'] = $successMessage;

        return $self;
    }

    public function withTitle(string $title): self
    {
        $self = clone $this;
        $self['title'] = $title;

        return $self;
    }

    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }
}
