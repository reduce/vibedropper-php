<?php

declare(strict_types=1);

namespace Vibedropper\Customers;

use Vibedropper\Core\Attributes\Optional;
use Vibedropper\Core\Concerns\SdkModel;
use Vibedropper\Core\Concerns\SdkParams;
use Vibedropper\Core\Contracts\BaseModel;

/**
 * Update customer.
 *
 * @see Vibedropper\Services\CustomersService::update()
 *
 * @phpstan-type CustomerUpdateParamsShape = array{
 *   name?: string|null, pickupLocationID?: string|null, regionID?: string|null
 * }
 */
final class CustomerUpdateParams implements BaseModel
{
    /** @use SdkModel<CustomerUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Optional]
    public ?string $name;

    #[Optional('pickupLocationId', nullable: true)]
    public ?string $pickupLocationID;

    #[Optional('regionId', nullable: true)]
    public ?string $regionID;

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
        ?string $name = null,
        ?string $pickupLocationID = null,
        ?string $regionID = null,
    ): self {
        $self = new self;

        null !== $name && $self['name'] = $name;
        null !== $pickupLocationID && $self['pickupLocationID'] = $pickupLocationID;
        null !== $regionID && $self['regionID'] = $regionID;

        return $self;
    }

    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    public function withPickupLocationID(?string $pickupLocationID): self
    {
        $self = clone $this;
        $self['pickupLocationID'] = $pickupLocationID;

        return $self;
    }

    public function withRegionID(?string $regionID): self
    {
        $self = clone $this;
        $self['regionID'] = $regionID;

        return $self;
    }
}
