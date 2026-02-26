<?php

declare(strict_types=1);

namespace Vibedropper\Customers;

use Vibedropper\Core\Attributes\Optional;
use Vibedropper\Core\Concerns\SdkModel;
use Vibedropper\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type CustomerShape from \Vibedropper\Customers\Customer
 *
 * @phpstan-type CustomerGetResponseShape = array{
 *   customer?: null|Customer|CustomerShape
 * }
 */
final class CustomerGetResponse implements BaseModel
{
    /** @use SdkModel<CustomerGetResponseShape> */
    use SdkModel;

    #[Optional]
    public ?Customer $customer;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Customer|CustomerShape|null $customer
     */
    public static function with(Customer|array|null $customer = null): self
    {
        $self = new self;

        null !== $customer && $self['customer'] = $customer;

        return $self;
    }

    /**
     * @param Customer|CustomerShape $customer
     */
    public function withCustomer(Customer|array $customer): self
    {
        $self = clone $this;
        $self['customer'] = $customer;

        return $self;
    }
}
