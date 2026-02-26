<?php

declare(strict_types=1);

namespace Vibedropper\Lists\Subscribers;

use Vibedropper\Core\Attributes\Optional;
use Vibedropper\Core\Attributes\Required;
use Vibedropper\Core\Concerns\SdkModel;
use Vibedropper\Core\Concerns\SdkParams;
use Vibedropper\Core\Contracts\BaseModel;

/**
 * Add subscriber.
 *
 * @see Vibedropper\Services\Lists\SubscribersService::add()
 *
 * @phpstan-type SubscriberAddParamsShape = array{
 *   email: string,
 *   customFields?: mixed,
 *   name?: string|null,
 *   pickupLocationID?: string|null,
 *   regionID?: string|null,
 * }
 */
final class SubscriberAddParams implements BaseModel
{
    /** @use SdkModel<SubscriberAddParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $email;

    #[Optional]
    public mixed $customFields;

    #[Optional]
    public ?string $name;

    #[Optional('pickupLocationId')]
    public ?string $pickupLocationID;

    #[Optional('regionId')]
    public ?string $regionID;

    /**
     * `new SubscriberAddParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SubscriberAddParams::with(email: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SubscriberAddParams)->withEmail(...)
     * ```
     */
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
        string $email,
        mixed $customFields = null,
        ?string $name = null,
        ?string $pickupLocationID = null,
        ?string $regionID = null,
    ): self {
        $self = new self;

        $self['email'] = $email;

        null !== $customFields && $self['customFields'] = $customFields;
        null !== $name && $self['name'] = $name;
        null !== $pickupLocationID && $self['pickupLocationID'] = $pickupLocationID;
        null !== $regionID && $self['regionID'] = $regionID;

        return $self;
    }

    public function withEmail(string $email): self
    {
        $self = clone $this;
        $self['email'] = $email;

        return $self;
    }

    public function withCustomFields(mixed $customFields): self
    {
        $self = clone $this;
        $self['customFields'] = $customFields;

        return $self;
    }

    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    public function withPickupLocationID(string $pickupLocationID): self
    {
        $self = clone $this;
        $self['pickupLocationID'] = $pickupLocationID;

        return $self;
    }

    public function withRegionID(string $regionID): self
    {
        $self = clone $this;
        $self['regionID'] = $regionID;

        return $self;
    }
}
