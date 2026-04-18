<?php

declare(strict_types=1);

namespace Vibedropper\KnowledgeBases\Articles;

use Vibedropper\Core\Attributes\Optional;
use Vibedropper\Core\Concerns\SdkModel;
use Vibedropper\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type KnowledgeBaseArticleShape from \Vibedropper\KnowledgeBases\Articles\KnowledgeBaseArticle
 *
 * @phpstan-type ArticleNewResponseShape = array{
 *   article?: null|KnowledgeBaseArticle|KnowledgeBaseArticleShape
 * }
 */
final class ArticleNewResponse implements BaseModel
{
    /** @use SdkModel<ArticleNewResponseShape> */
    use SdkModel;

    #[Optional]
    public ?KnowledgeBaseArticle $article;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param KnowledgeBaseArticle|KnowledgeBaseArticleShape|null $article
     */
    public static function with(
        KnowledgeBaseArticle|array|null $article = null
    ): self {
        $self = new self;

        null !== $article && $self['article'] = $article;

        return $self;
    }

    /**
     * @param KnowledgeBaseArticle|KnowledgeBaseArticleShape $article
     */
    public function withArticle(KnowledgeBaseArticle|array $article): self
    {
        $self = clone $this;
        $self['article'] = $article;

        return $self;
    }
}
