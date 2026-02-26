<?php

declare(strict_types=1);

namespace Vibedropper\Customers;

use Vibedropper\Core\Attributes\Optional;
use Vibedropper\Core\Concerns\SdkModel;
use Vibedropper\Core\Contracts\BaseModel;

/**
 * @phpstan-type CustomerShape = array{
 *   id?: string|null,
 *   averageOrderValue?: float|null,
 *   email?: string|null,
 *   lastPurchaseDate?: \DateTimeInterface|null,
 *   lists?: list<mixed>|null,
 *   name?: string|null,
 *   orgID?: string|null,
 *   pickupLocation?: mixed,
 *   purchaseCount?: int|null,
 *   region?: mixed,
 *   roles?: list<mixed>|null,
 *   totalSpent?: float|null,
 * }
 */
final class Customer implements BaseModel
{
    /** @use SdkModel<CustomerShape> */
    use SdkModel;

    #[Optional]
    public ?string $id;

    #[Optional]
    public ?float $averageOrderValue;

    #[Optional]
    public ?string $email;

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

    #[Optional]
    public ?int $purchaseCount;

    #[Optional(nullable: true)]
    public mixed $region;

    /** @var list<mixed>|null $roles */
    #[Optional(list: 'mixed')]
    public ?array $roles;

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
        ?float $averageOrderValue = null,
        ?string $email = null,
        ?\DateTimeInterface $lastPurchaseDate = null,
        ?array $lists = null,
        ?string $name = null,
        ?string $orgID = null,
        mixed $pickupLocation = null,
        ?int $purchaseCount = null,
        mixed $region = null,
        ?array $roles = null,
        ?float $totalSpent = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $averageOrderValue && $self['averageOrderValue'] = $averageOrderValue;
        null !== $email && $self['email'] = $email;
        null !== $lastPurchaseDate && $self['lastPurchaseDate'] = $lastPurchaseDate;
        null !== $lists && $self['lists'] = $lists;
        null !== $name && $self['name'] = $name;
        null !== $orgID && $self['orgID'] = $orgID;
        null !== $pickupLocation && $self['pickupLocation'] = $pickupLocation;
        null !== $purchaseCount && $self['purchaseCount'] = $purchaseCount;
        null !== $region && $self['region'] = $region;
        null !== $roles && $self['roles'] = $roles;
        null !== $totalSpent && $self['totalSpent'] = $totalSpent;

        return $self;
    }

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    public function withAverageOrderValue(float $averageOrderValue): self
    {
        $self = clone $this;
        $self['averageOrderValue'] = $averageOrderValue;

        return $self;
    }

    public function withEmail(string $email): self
    {
        $self = clone $this;
        $self['email'] = $email;

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

    public function withTotalSpent(float $totalSpent): self
    {
        $self = clone $this;
        $self['totalSpent'] = $totalSpent;

        return $self;
    }
}
