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
 *   addressLine1?: string|null,
 *   addressLine2?: string|null,
 *   city?: string|null,
 *   country?: string|null,
 *   firstName?: string|null,
 *   lastName?: string|null,
 *   name?: string|null,
 *   pickupLocationID?: string|null,
 *   postalCode?: string|null,
 *   regionID?: string|null,
 *   state?: string|null,
 * }
 */
final class CustomerUpdateParams implements BaseModel
{
    /** @use SdkModel<CustomerUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Optional(nullable: true)]
    public ?string $addressLine1;

    #[Optional(nullable: true)]
    public ?string $addressLine2;

    #[Optional(nullable: true)]
    public ?string $city;

    #[Optional(nullable: true)]
    public ?string $country;

    #[Optional(nullable: true)]
    public ?string $firstName;

    #[Optional(nullable: true)]
    public ?string $lastName;

    #[Optional]
    public ?string $name;

    #[Optional('pickupLocationId', nullable: true)]
    public ?string $pickupLocationID;

    #[Optional(nullable: true)]
    public ?string $postalCode;

    #[Optional('regionId', nullable: true)]
    public ?string $regionID;

    #[Optional(nullable: true)]
    public ?string $state;

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
        ?string $addressLine1 = null,
        ?string $addressLine2 = null,
        ?string $city = null,
        ?string $country = null,
        ?string $firstName = null,
        ?string $lastName = null,
        ?string $name = null,
        ?string $pickupLocationID = null,
        ?string $postalCode = null,
        ?string $regionID = null,
        ?string $state = null,
    ): self {
        $self = new self;

        null !== $addressLine1 && $self['addressLine1'] = $addressLine1;
        null !== $addressLine2 && $self['addressLine2'] = $addressLine2;
        null !== $city && $self['city'] = $city;
        null !== $country && $self['country'] = $country;
        null !== $firstName && $self['firstName'] = $firstName;
        null !== $lastName && $self['lastName'] = $lastName;
        null !== $name && $self['name'] = $name;
        null !== $pickupLocationID && $self['pickupLocationID'] = $pickupLocationID;
        null !== $postalCode && $self['postalCode'] = $postalCode;
        null !== $regionID && $self['regionID'] = $regionID;
        null !== $state && $self['state'] = $state;

        return $self;
    }

    public function withAddressLine1(?string $addressLine1): self
    {
        $self = clone $this;
        $self['addressLine1'] = $addressLine1;

        return $self;
    }

    public function withAddressLine2(?string $addressLine2): self
    {
        $self = clone $this;
        $self['addressLine2'] = $addressLine2;

        return $self;
    }

    public function withCity(?string $city): self
    {
        $self = clone $this;
        $self['city'] = $city;

        return $self;
    }

    public function withCountry(?string $country): self
    {
        $self = clone $this;
        $self['country'] = $country;

        return $self;
    }

    public function withFirstName(?string $firstName): self
    {
        $self = clone $this;
        $self['firstName'] = $firstName;

        return $self;
    }

    public function withLastName(?string $lastName): self
    {
        $self = clone $this;
        $self['lastName'] = $lastName;

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

    public function withPostalCode(?string $postalCode): self
    {
        $self = clone $this;
        $self['postalCode'] = $postalCode;

        return $self;
    }

    public function withRegionID(?string $regionID): self
    {
        $self = clone $this;
        $self['regionID'] = $regionID;

        return $self;
    }

    public function withState(?string $state): self
    {
        $self = clone $this;
        $self['state'] = $state;

        return $self;
    }
}
