<?php

declare(strict_types=1);

namespace Vibedropper\Forms;

use Vibedropper\Core\Attributes\Optional;
use Vibedropper\Core\Concerns\SdkModel;
use Vibedropper\Core\Contracts\BaseModel;
use Vibedropper\Lists\Pagination;

/**
 * @phpstan-import-type FormShape from \Vibedropper\Forms\Form
 * @phpstan-import-type PaginationShape from \Vibedropper\Lists\Pagination
 *
 * @phpstan-type FormListResponseShape = array{
 *   forms?: list<Form|FormShape>|null,
 *   pagination?: null|Pagination|PaginationShape,
 * }
 */
final class FormListResponse implements BaseModel
{
    /** @use SdkModel<FormListResponseShape> */
    use SdkModel;

    /** @var list<Form>|null $forms */
    #[Optional(list: Form::class)]
    public ?array $forms;

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
     * @param list<Form|FormShape>|null $forms
     * @param Pagination|PaginationShape|null $pagination
     */
    public static function with(
        ?array $forms = null,
        Pagination|array|null $pagination = null
    ): self {
        $self = new self;

        null !== $forms && $self['forms'] = $forms;
        null !== $pagination && $self['pagination'] = $pagination;

        return $self;
    }

    /**
     * @param list<Form|FormShape> $forms
     */
    public function withForms(array $forms): self
    {
        $self = clone $this;
        $self['forms'] = $forms;

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
