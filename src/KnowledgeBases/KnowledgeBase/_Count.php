<?php

declare(strict_types=1);

namespace Vibedropper\KnowledgeBases\KnowledgeBase;

use Vibedropper\Core\Attributes\Optional;
use Vibedropper\Core\Concerns\SdkModel;
use Vibedropper\Core\Contracts\BaseModel;

/**
 * @phpstan-type _CountShape = array{articles?: int|null, categories?: int|null}
 */
final class _Count implements BaseModel
{
    /** @use SdkModel<_CountShape> */
    use SdkModel;

    #[Optional]
    public ?int $articles;

    #[Optional]
    public ?int $categories;

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
        ?int $articles = null,
        ?int $categories = null
    ): self {
        $self = new self;

        null !== $articles && $self['articles'] = $articles;
        null !== $categories && $self['categories'] = $categories;

        return $self;
    }

    public function withArticles(int $articles): self
    {
        $self = clone $this;
        $self['articles'] = $articles;

        return $self;
    }

    public function withCategories(int $categories): self
    {
        $self = clone $this;
        $self['categories'] = $categories;

        return $self;
    }
}
