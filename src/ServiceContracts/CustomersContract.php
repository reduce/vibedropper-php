<?php

declare(strict_types=1);

namespace Vibedropper\ServiceContracts;

use Vibedropper\Core\Exceptions\APIException;
use Vibedropper\Customers\CustomerGetResponse;
use Vibedropper\Customers\CustomerListResponse;
use Vibedropper\Customers\CustomerUpdateResponse;
use Vibedropper\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Vibedropper\RequestOptions
 */
interface CustomersContract
{
    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $customerID,
        RequestOptions|array|null $requestOptions = null
    ): CustomerGetResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        string $customerID,
        ?string $name = null,
        ?string $pickupLocationID = null,
        ?string $regionID = null,
        RequestOptions|array|null $requestOptions = null,
    ): CustomerUpdateResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        int $limit = 20,
        int $page = 1,
        ?string $search = null,
        RequestOptions|array|null $requestOptions = null,
    ): CustomerListResponse;
}
