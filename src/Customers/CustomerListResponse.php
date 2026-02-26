<?php

declare(strict_types=1);

namespace Vibedropper\Customers;

use Vibedropper\Core\Attributes\Optional;
use Vibedropper\Core\Concerns\SdkModel;
use Vibedropper\Core\Contracts\BaseModel;
use Vibedropper\Customers\CustomerListResponse\Pagination;

/**
 * @phpstan-import-type CustomerShape from \Vibedropper\Customers\Customer
 * @phpstan-import-type PaginationShape from \Vibedropper\Customers\CustomerListResponse\Pagination
 *
 * @phpstan-type CustomerListResponseShape = array{
 *   customers?: list<Customer|CustomerShape>|null,
 *   pagination?: null|Pagination|PaginationShape,
 * }
 */
final class CustomerListResponse implements BaseModel
{
    /** @use SdkModel<CustomerListResponseShape> */
    use SdkModel;

    /** @var list<Customer>|null $customers */
    #[Optional(list: Customer::class)]
    public ?array $customers;

    #[Optional]
    public ?Pagination $pagination;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<Customer|CustomerShape>|null $customers
     * @param Pagination|PaginationShape|null $pagination
     */
    public static function with(
        ?array $customers = null,
        Pagination|array|null $pagination = null
    ): self {
        $self = new self;

        null !== $customers && $self['customers'] = $customers;
        null !== $pagination && $self['pagination'] = $pagination;

        return $self;
    }

    /**
     * @param list<Customer|CustomerShape> $customers
     */
    public function withCustomers(array $customers): self
    {
        $self = clone $this;
        $self['customers'] = $customers;

        return $self;
    }

    /**
     * @param Pagination|PaginationShape $pagination
     */
    public function withPagination(Pagination|array $pagination): self
    {
        $self = clone $this;
        $self['pagination'] = $pagination;

        return $self;
    }
}
