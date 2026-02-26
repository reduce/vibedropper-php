<?php

declare(strict_types=1);

namespace Vibedropper\Lists;

use Vibedropper\Core\Attributes\Optional;
use Vibedropper\Core\Concerns\SdkModel;
use Vibedropper\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type ListShape from \Vibedropper\Lists\List_
 *
 * @phpstan-type ListGetResponseShape = array{list?: null|List_|ListShape}
 */
final class ListGetResponse implements BaseModel
{
    /** @use SdkModel<ListGetResponseShape> */
    use SdkModel;

    #[Optional]
    public ?List_ $list;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param List_|ListShape|null $list
     */
    public static function with(List_|array|null $list = null): self
    {
        $self = new self;

        null !== $list && $self['list'] = $list;

        return $self;
    }

    /**
     * @param List_|ListShape $list
     */
    public function withList(List_|array $list): self
    {
        $self = clone $this;
        $self['list'] = $list;

        return $self;
    }
}
