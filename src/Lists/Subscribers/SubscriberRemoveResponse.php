<?php

declare(strict_types=1);

namespace Vibedropper\Lists\Subscribers;

use Vibedropper\Core\Attributes\Optional;
use Vibedropper\Core\Concerns\SdkModel;
use Vibedropper\Core\Contracts\BaseModel;

/**
 * @phpstan-type SubscriberRemoveResponseShape = array{success?: bool|null}
 */
final class SubscriberRemoveResponse implements BaseModel
{
    /** @use SdkModel<SubscriberRemoveResponseShape> */
    use SdkModel;

    #[Optional]
    public ?bool $success;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?bool $success = null): self
    {
        $self = new self;

        null !== $success && $self['success'] = $success;

        return $self;
    }

    public function withSuccess(bool $success): self
    {
        $self = clone $this;
        $self['success'] = $success;

        return $self;
    }
}
