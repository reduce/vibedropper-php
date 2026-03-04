<?php

declare(strict_types=1);

namespace Vibedropper\Forms\FormListSubmissionsResponse\Submission;

use Vibedropper\Core\Attributes\Optional;
use Vibedropper\Core\Concerns\SdkModel;
use Vibedropper\Core\Contracts\BaseModel;

/**
 * @phpstan-type SubscriberShape = array{
 *   id?: string|null, email?: string|null, name?: string|null
 * }
 */
final class Subscriber implements BaseModel
{
    /** @use SdkModel<SubscriberShape> */
    use SdkModel;

    #[Optional]
    public ?string $id;

    #[Optional]
    public ?string $email;

    #[Optional(nullable: true)]
    public ?string $name;

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
        ?string $id = null,
        ?string $email = null,
        ?string $name = null
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $email && $self['email'] = $email;
        null !== $name && $self['name'] = $name;

        return $self;
    }

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    public function withEmail(string $email): self
    {
        $self = clone $this;
        $self['email'] = $email;

        return $self;
    }

    public function withName(?string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }
}
