<?php

declare(strict_types=1);

namespace Vibedropper\KnowledgeBases\Articles;

use Vibedropper\Core\Attributes\Optional;
use Vibedropper\Core\Attributes\Required;
use Vibedropper\Core\Concerns\SdkModel;
use Vibedropper\Core\Concerns\SdkParams;
use Vibedropper\Core\Contracts\BaseModel;

/**
 * Create an article.
 *
 * @see Vibedropper\Services\KnowledgeBases\ArticlesService::create()
 *
 * @phpstan-type ArticleCreateParamsShape = array{
 *   title: string,
 *   categoryID?: string|null,
 *   content?: string|null,
 *   excerpt?: string|null,
 *   published?: bool|null,
 * }
 */
final class ArticleCreateParams implements BaseModel
{
    /** @use SdkModel<ArticleCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $title;

    #[Optional('categoryId', nullable: true)]
    public ?string $categoryID;

    /**
     * HTML content.
     */
    #[Optional]
    public ?string $content;

    #[Optional(nullable: true)]
    public ?string $excerpt;

    #[Optional]
    public ?bool $published;

    /**
     * `new ArticleCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ArticleCreateParams::with(title: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ArticleCreateParams)->withTitle(...)
     * ```
     */
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
        string $title,
        ?string $categoryID = null,
        ?string $content = null,
        ?string $excerpt = null,
        ?bool $published = null,
    ): self {
        $self = new self;

        $self['title'] = $title;

        null !== $categoryID && $self['categoryID'] = $categoryID;
        null !== $content && $self['content'] = $content;
        null !== $excerpt && $self['excerpt'] = $excerpt;
        null !== $published && $self['published'] = $published;

        return $self;
    }

    public function withTitle(string $title): self
    {
        $self = clone $this;
        $self['title'] = $title;

        return $self;
    }

    public function withCategoryID(?string $categoryID): self
    {
        $self = clone $this;
        $self['categoryID'] = $categoryID;

        return $self;
    }

    /**
     * HTML content.
     */
    public function withContent(string $content): self
    {
        $self = clone $this;
        $self['content'] = $content;

        return $self;
    }

    public function withExcerpt(?string $excerpt): self
    {
        $self = clone $this;
        $self['excerpt'] = $excerpt;

        return $self;
    }

    public function withPublished(bool $published): self
    {
        $self = clone $this;
        $self['published'] = $published;

        return $self;
    }
}
