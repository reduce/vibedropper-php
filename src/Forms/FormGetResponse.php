<?php

declare(strict_types=1);

namespace Vibedropper\Forms;

use Vibedropper\Core\Attributes\Optional;
use Vibedropper\Core\Concerns\SdkModel;
use Vibedropper\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type FormShape from \Vibedropper\Forms\Form
 *
 * @phpstan-type FormGetResponseShape = array{form?: null|Form|FormShape}
 */
final class FormGetResponse implements BaseModel
{
    /** @use SdkModel<FormGetResponseShape> */
    use SdkModel;

    #[Optional]
    public ?Form $form;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Form|FormShape|null $form
     */
    public static function with(Form|array|null $form = null): self
    {
        $self = new self;

        null !== $form && $self['form'] = $form;

        return $self;
    }

    /**
     * @param Form|FormShape $form
     */
    public function withForm(Form|array $form): self
    {
        $self = clone $this;
        $self['form'] = $form;

        return $self;
    }
}
