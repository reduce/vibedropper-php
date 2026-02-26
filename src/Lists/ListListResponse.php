<?php

declare(strict_types=1);

namespace Vibedropper\Lists;

use Vibedropper\Core\Attributes\Optional;
use Vibedropper\Core\Concerns\SdkModel;
use Vibedropper\Core\Contracts\BaseModel;
use Vibedropper\Lists\ListListResponse\Pagination;

/**
 * @phpstan-import-type ListShape from \Vibedropper\Lists\List_
 * @phpstan-import-type PaginationShape from \Vibedropper\Lists\ListListResponse\Pagination
 *
 * @phpstan-type ListListResponseShape = array{
 *   lists?: list<List_|ListShape>|null,
 *   pagination?: null|Pagination|PaginationShape,
 * }
 */
final class ListListResponse implements BaseModel
{
    /** @use SdkModel<ListListResponseShape> */
    use SdkModel;

    /** @var list<List_>|null $lists */
    #[Optional(list: List_::class)]
    public ?array $lists;

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
     * @param list<List_|ListShape>|null $lists
     * @param Pagination|PaginationShape|null $pagination
     */
    public static function with(
        ?array $lists = null,
        Pagination|array|null $pagination = null
    ): self {
        $self = new self;

        null !== $lists && $self['lists'] = $lists;
        null !== $pagination && $self['pagination'] = $pagination;

        return $self;
    }

    /**
     * @param list<List_|ListShape> $lists
     */
    public function withLists(array $lists): self
    {
        $self = clone $this;
        $self['lists'] = $lists;

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
