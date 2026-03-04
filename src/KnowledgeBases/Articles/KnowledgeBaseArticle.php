<?php

declare(strict_types=1);

namespace Vibedropper\KnowledgeBases\Articles;

use Vibedropper\Core\Attributes\Optional;
use Vibedropper\Core\Concerns\SdkModel;
use Vibedropper\Core\Contracts\BaseModel;
use Vibedropper\KnowledgeBases\Articles\KnowledgeBaseArticle\Category;

/**
 * @phpstan-import-type CategoryShape from \Vibedropper\KnowledgeBases\Articles\KnowledgeBaseArticle\Category
 *
 * @phpstan-type KnowledgeBaseArticleShape = array{
 *   id?: string|null,
 *   category?: null|Category|CategoryShape,
 *   categoryID?: string|null,
 *   content?: string|null,
 *   createdAt?: \DateTimeInterface|null,
 *   excerpt?: string|null,
 *   knowledgeBaseID?: string|null,
 *   published?: bool|null,
 *   slug?: string|null,
 *   sortOrder?: int|null,
 *   title?: string|null,
 *   updatedAt?: \DateTimeInterface|null,
 * }
 */
final class KnowledgeBaseArticle implements BaseModel
{
    /** @use SdkModel<KnowledgeBaseArticleShape> */
    use SdkModel;

    #[Optional]
    public ?string $id;

    #[Optional(nullable: true)]
    public ?Category $category;

    #[Optional('categoryId', nullable: true)]
    public ?string $categoryID;

    #[Optional]
    public ?string $content;

    #[Optional]
    public ?\DateTimeInterface $createdAt;

    #[Optional(nullable: true)]
    public ?string $excerpt;

    #[Optional('knowledgeBaseId')]
    public ?string $knowledgeBaseID;

    #[Optional]
    public ?bool $published;

    #[Optional]
    public ?string $slug;

    #[Optional]
    public ?int $sortOrder;

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
     * @param Category|CategoryShape|null $category
     */
    public static function with(
        ?string $id = null,
        Category|array|null $category = null,
        ?string $categoryID = null,
        ?string $content = null,
        ?\DateTimeInterface $createdAt = null,
        ?string $excerpt = null,
        ?string $knowledgeBaseID = null,
        ?bool $published = null,
        ?string $slug = null,
        ?int $sortOrder = null,
        ?string $title = null,
        ?\DateTimeInterface $updatedAt = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $category && $self['category'] = $category;
        null !== $categoryID && $self['categoryID'] = $categoryID;
        null !== $content && $self['content'] = $content;
        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $excerpt && $self['excerpt'] = $excerpt;
        null !== $knowledgeBaseID && $self['knowledgeBaseID'] = $knowledgeBaseID;
        null !== $published && $self['published'] = $published;
        null !== $slug && $self['slug'] = $slug;
        null !== $sortOrder && $self['sortOrder'] = $sortOrder;
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
     * @param Category|CategoryShape|null $category
     */
    public function withCategory(Category|array|null $category): self
    {
        $self = clone $this;
        $self['category'] = $category;

        return $self;
    }

    public function withCategoryID(?string $categoryID): self
    {
        $self = clone $this;
        $self['categoryID'] = $categoryID;

        return $self;
    }

    public function withContent(string $content): self
    {
        $self = clone $this;
        $self['content'] = $content;

        return $self;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    public function withExcerpt(?string $excerpt): self
    {
        $self = clone $this;
        $self['excerpt'] = $excerpt;

        return $self;
    }

    public function withKnowledgeBaseID(string $knowledgeBaseID): self
    {
        $self = clone $this;
        $self['knowledgeBaseID'] = $knowledgeBaseID;

        return $self;
    }

    public function withPublished(bool $published): self
    {
        $self = clone $this;
        $self['published'] = $published;

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
