<?php

declare(strict_types=1);

namespace Vibedropper\Pages;

use Vibedropper\Core\Attributes\Optional;
use Vibedropper\Core\Concerns\SdkModel;
use Vibedropper\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type PageShape from \Vibedropper\Pages\Page
 *
 * @phpstan-type PageGetResponseShape = array{page?: null|Page|PageShape}
 */
final class PageGetResponse implements BaseModel
{
    /** @use SdkModel<PageGetResponseShape> */
    use SdkModel;

    #[Optional]
    public ?Page $page;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Page|PageShape|null $page
     */
    public static function with(Page|array|null $page = null): self
    {
        $self = new self;

        null !== $page && $self['page'] = $page;

        return $self;
    }

    /**
     * @param Page|PageShape $page
     */
    public function withPage(Page|array $page): self
    {
        $self = clone $this;
        $self['page'] = $page;

        return $self;
    }
}
