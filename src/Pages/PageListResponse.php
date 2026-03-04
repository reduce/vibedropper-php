<?php

declare(strict_types=1);

namespace Vibedropper\Pages;

use Vibedropper\Core\Attributes\Optional;
use Vibedropper\Core\Concerns\SdkModel;
use Vibedropper\Core\Contracts\BaseModel;
use Vibedropper\Lists\Pagination;

/**
 * @phpstan-import-type PageShape from \Vibedropper\Pages\Page
 * @phpstan-import-type PaginationShape from \Vibedropper\Lists\Pagination
 *
 * @phpstan-type PageListResponseShape = array{
 *   pages?: list<Page|PageShape>|null,
 *   pagination?: null|Pagination|PaginationShape,
 * }
 */
final class PageListResponse implements BaseModel
{
    /** @use SdkModel<PageListResponseShape> */
    use SdkModel;

    /** @var list<Page>|null $pages */
    #[Optional(list: Page::class)]
    public ?array $pages;

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
     * @param list<Page|PageShape>|null $pages
     * @param Pagination|PaginationShape|null $pagination
     */
    public static function with(
        ?array $pages = null,
        Pagination|array|null $pagination = null
    ): self {
        $self = new self;

        null !== $pages && $self['pages'] = $pages;
        null !== $pagination && $self['pagination'] = $pagination;

        return $self;
    }

    /**
     * @param list<Page|PageShape> $pages
     */
    public function withPages(array $pages): self
    {
        $self = clone $this;
        $self['pages'] = $pages;

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
