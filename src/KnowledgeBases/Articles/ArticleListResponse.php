<?php

declare(strict_types=1);

namespace Vibedropper\KnowledgeBases\Articles;

use Vibedropper\Core\Attributes\Optional;
use Vibedropper\Core\Concerns\SdkModel;
use Vibedropper\Core\Contracts\BaseModel;
use Vibedropper\Lists\Pagination;

/**
 * @phpstan-import-type KnowledgeBaseArticleShape from \Vibedropper\KnowledgeBases\Articles\KnowledgeBaseArticle
 * @phpstan-import-type PaginationShape from \Vibedropper\Lists\Pagination
 *
 * @phpstan-type ArticleListResponseShape = array{
 *   articles?: list<KnowledgeBaseArticle|KnowledgeBaseArticleShape>|null,
 *   pagination?: null|Pagination|PaginationShape,
 * }
 */
final class ArticleListResponse implements BaseModel
{
    /** @use SdkModel<ArticleListResponseShape> */
    use SdkModel;

    /** @var list<KnowledgeBaseArticle>|null $articles */
    #[Optional(list: KnowledgeBaseArticle::class)]
    public ?array $articles;

    #[Optional]
    public ?Pagination $pagination;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<KnowledgeBaseArticle|KnowledgeBaseArticleShape>|null $articles
     * @param Pagination|PaginationShape|null $pagination
     */
    public static function with(
        ?array $articles = null,
        Pagination|array|null $pagination = null
    ): self {
        $self = new self;

        null !== $articles && $self['articles'] = $articles;
        null !== $pagination && $self['pagination'] = $pagination;

        return $self;
    }

    /**
     * @param list<KnowledgeBaseArticle|KnowledgeBaseArticleShape> $articles
     */
    public function withArticles(array $articles): self
    {
        $self = clone $this;
        $self['articles'] = $articles;

        return $self;
    }

    /**
     * @param Pagination|PaginationShape $pagination
     */
    public function withPagination(Pagination|array $pagination): self
    {
        $self = clone $this;
        $self['pagination'] = $pagination;

        return $self;
    }
}
