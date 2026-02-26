<?php

declare(strict_types=1);

namespace Vibedropper\Lists\Subscribers;

use Vibedropper\Core\Attributes\Optional;
use Vibedropper\Core\Concerns\SdkModel;
use Vibedropper\Core\Contracts\BaseModel;
use Vibedropper\Lists\Subscribers\Subscriber\Status;

/**
 * @phpstan-type SubscriberShape = array{
 *   id?: string|null,
 *   customer?: mixed,
 *   customFields?: mixed,
 *   email?: string|null,
 *   listID?: string|null,
 *   name?: string|null,
 *   status?: null|Status|value-of<Status>,
 *   subscribedAt?: \DateTimeInterface|null,
 * }
 */
final class Subscriber implements BaseModel
{
    /** @use SdkModel<SubscriberShape> */
    use SdkModel;

    #[Optional]
    public ?string $id;

    #[Optional(nullable: true)]
    public mixed $customer;

    #[Optional(nullable: true)]
    public mixed $customFields;

    #[Optional]
    public ?string $email;

    #[Optional('listId')]
    public ?string $listID;

    #[Optional(nullable: true)]
    public ?string $name;

    /** @var value-of<Status>|null $status */
    #[Optional(enum: Status::class)]
    public ?string $status;

    #[Optional]
    public ?\DateTimeInterface $subscribedAt;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Status|value-of<Status>|null $status
     */
    public static function with(
        ?string $id = null,
        mixed $customer = null,
        mixed $customFields = null,
        ?string $email = null,
        ?string $listID = null,
        ?string $name = null,
        Status|string|null $status = null,
        ?\DateTimeInterface $subscribedAt = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $customer && $self['customer'] = $customer;
        null !== $customFields && $self['customFields'] = $customFields;
        null !== $email && $self['email'] = $email;
        null !== $listID && $self['listID'] = $listID;
        null !== $name && $self['name'] = $name;
        null !== $status && $self['status'] = $status;
        null !== $subscribedAt && $self['subscribedAt'] = $subscribedAt;

        return $self;
    }

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    public function withCustomer(mixed $customer): self
    {
        $self = clone $this;
        $self['customer'] = $customer;

        return $self;
    }

    public function withCustomFields(mixed $customFields): self
    {
        $self = clone $this;
        $self['customFields'] = $customFields;

        return $self;
    }

    public function withEmail(string $email): self
    {
        $self = clone $this;
        $self['email'] = $email;

        return $self;
    }

    public function withListID(string $listID): self
    {
        $self = clone $this;
        $self['listID'] = $listID;

        return $self;
    }

    public function withName(?string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }

    public function withSubscribedAt(\DateTimeInterface $subscribedAt): self
    {
        $self = clone $this;
        $self['subscribedAt'] = $subscribedAt;

        return $self;
    }
}
