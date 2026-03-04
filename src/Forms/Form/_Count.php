<?php

declare(strict_types=1);

namespace Vibedropper\Forms\Form;

use Vibedropper\Core\Attributes\Optional;
use Vibedropper\Core\Concerns\SdkModel;
use Vibedropper\Core\Contracts\BaseModel;

/**
 * @phpstan-type _CountShape = array{formSubmissions?: int|null}
 */
final class _Count implements BaseModel
{
    /** @use SdkModel<_CountShape> */
    use SdkModel;

    #[Optional]
    public ?int $formSubmissions;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?int $formSubmissions = null): self
    {
        $self = new self;

        null !== $formSubmissions && $self['formSubmissions'] = $formSubmissions;

        return $self;
    }

    public function withFormSubmissions(int $formSubmissions): self
    {
        $self = clone $this;
        $self['formSubmissions'] = $formSubmissions;

        return $self;
    }
}
