<?php

declare(strict_types=1);

namespace Vibedropper\Customers;

use Vibedropper\Core\Attributes\Optional;
use Vibedropper\Core\Concerns\SdkModel;
use Vibedropper\Core\Contracts\BaseModel;

/**
 * @phpstan-type CustomerShape = array{
 *   id?: string|null,
 *   addressLine1?: string|null,
 *   addressLine2?: string|null,
 *   averageOrderValue?: float|null,
 *   city?: string|null,
 *   country?: string|null,
 *   email?: string|null,
 *   firstName?: string|null,
 *   lastName?: string|null,
 *   lastPurchaseDate?: \DateTimeInterface|null,
 *   lists?: list<mixed>|null,
 *   name?: string|null,
 *   orgID?: string|null,
 *   pickupLocation?: mixed,
 *   postalCode?: string|null,
 *   purchaseCount?: int|null,
 *   region?: mixed,
 *   roles?: list<mixed>|null,
 *   state?: string|null,
 *   totalSpent?: float|null,
 * }
 */
final class Customer implements BaseModel
{
    /** @use SdkModel<CustomerShape> */
    use SdkModel;

    #[Optional]
    public ?string $id;

    #[Optional(nullable: true)]
    public ?string $addressLine1;

    #[Optional(nullable: true)]
    public ?string $addressLine2;

    #[Optional]
    public ?float $averageOrderValue;

    #[Optional(nullable: true)]
    public ?string $city;

    #[Optional(nullable: true)]
    public ?string $country;

    #[Optional]
    public ?string $email;

    #[Optional(nullable: true)]
    public ?string $firstName;

    #[Optional(nullable: true)]
    public ?string $lastName;

    #[Optional(nullable: true)]
    public ?\DateTimeInterface $lastPurchaseDate;

    /** @var list<mixed>|null $lists */
    #[Optional(list: 'mixed')]
    public ?array $lists;

    #[Optional(nullable: true)]
    public ?string $name;

    #[Optional('orgId')]
    public ?string $orgID;

    #[Optional(nullable: true)]
    public mixed $pickupLocation;

    #[Optional(nullable: true)]
    public ?string $postalCode;

    #[Optional]
    public ?int $purchaseCount;

    #[Optional(nullable: true)]
    public mixed $region;

    /** @var list<mixed>|null $roles */
    #[Optional(list: 'mixed')]
    public ?array $roles;

    #[Optional(nullable: true)]
    public ?string $state;

    #[Optional]
    public ?float $totalSpent;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<mixed>|null $lists
     * @param list<mixed>|null $roles
     */
    public static function with(
        ?string $id = null,
        ?string $addressLine1 = null,
        ?string $addressLine2 = null,
        ?float $averageOrderValue = null,
        ?string $city = null,
        ?string $country = null,
        ?string $email = null,
        ?string $firstName = null,
        ?string $lastName = null,
        ?\DateTimeInterface $lastPurchaseDate = null,
        ?array $lists = null,
        ?string $name = null,
        ?string $orgID = null,
        mixed $pickupLocation = null,
        ?string $postalCode = null,
        ?int $purchaseCount = null,
        mixed $region = null,
        ?array $roles = null,
        ?string $state = null,
        ?float $totalSpent = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $addressLine1 && $self['addressLine1'] = $addressLine1;
        null !== $addressLine2 && $self['addressLine2'] = $addressLine2;
        null !== $averageOrderValue && $self['averageOrderValue'] = $averageOrderValue;
        null !== $city && $self['city'] = $city;
        null !== $country && $self['country'] = $country;
        null !== $email && $self['email'] = $email;
        null !== $firstName && $self['firstName'] = $firstName;
        null !== $lastName && $self['lastName'] = $lastName;
        null !== $lastPurchaseDate && $self['lastPurchaseDate'] = $lastPurchaseDate;
        null !== $lists && $self['lists'] = $lists;
        null !== $name && $self['name'] = $name;
        null !== $orgID && $self['orgID'] = $orgID;
        null !== $pickupLocation && $self['pickupLocation'] = $pickupLocation;
        null !== $postalCode && $self['postalCode'] = $postalCode;
        null !== $purchaseCount && $self['purchaseCount'] = $purchaseCount;
        null !== $region && $self['region'] = $region;
        null !== $roles && $self['roles'] = $roles;
        null !== $state && $self['state'] = $state;
        null !== $totalSpent && $self['totalSpent'] = $totalSpent;

        return $self;
    }

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

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

    public function withAverageOrderValue(float $averageOrderValue): self
    {
        $self = clone $this;
        $self['averageOrderValue'] = $averageOrderValue;

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

    public function withEmail(string $email): self
    {
        $self = clone $this;
        $self['email'] = $email;

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

    public function withLastPurchaseDate(
        ?\DateTimeInterface $lastPurchaseDate
    ): self {
        $self = clone $this;
        $self['lastPurchaseDate'] = $lastPurchaseDate;

        return $self;
    }

    /**
     * @param list<mixed> $lists
     */
    public function withLists(array $lists): self
    {
        $self = clone $this;
        $self['lists'] = $lists;

        return $self;
    }

    public function withName(?string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    public function withOrgID(string $orgID): self
    {
        $self = clone $this;
        $self['orgID'] = $orgID;

        return $self;
    }

    public function withPickupLocation(mixed $pickupLocation): self
    {
        $self = clone $this;
        $self['pickupLocation'] = $pickupLocation;

        return $self;
    }

    public function withPostalCode(?string $postalCode): self
    {
        $self = clone $this;
        $self['postalCode'] = $postalCode;

        return $self;
    }

    public function withPurchaseCount(int $purchaseCount): self
    {
        $self = clone $this;
        $self['purchaseCount'] = $purchaseCount;

        return $self;
    }

    public function withRegion(mixed $region): self
    {
        $self = clone $this;
        $self['region'] = $region;

        return $self;
    }

    /**
     * @param list<mixed> $roles
     */
    public function withRoles(array $roles): self
    {
        $self = clone $this;
        $self['roles'] = $roles;

        return $self;
    }

    public function withState(?string $state): self
    {
        $self = clone $this;
        $self['state'] = $state;

        return $self;
    }

    public function withTotalSpent(float $totalSpent): self
    {
        $self = clone $this;
        $self['totalSpent'] = $totalSpent;

        return $self;
    }
}
