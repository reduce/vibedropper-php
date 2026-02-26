<?php

declare(strict_types=1);

namespace Vibedropper\Services;

use Vibedropper\Client;
use Vibedropper\Core\Exceptions\APIException;
use Vibedropper\Core\Util;
use Vibedropper\Customers\CustomerGetResponse;
use Vibedropper\Customers\CustomerListResponse;
use Vibedropper\Customers\CustomerUpdateResponse;
use Vibedropper\RequestOptions;
use Vibedropper\ServiceContracts\CustomersContract;

/**
 * @phpstan-import-type RequestOpts from \Vibedropper\RequestOptions
 */
final class CustomersService implements CustomersContract
{
    /**
     * @api
     */
    public CustomersRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new CustomersRawService($client);
    }

    /**
     * @api
     *
     * Get customer
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $customerID,
        RequestOptions|array|null $requestOptions = null
    ): CustomerGetResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($customerID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Update customer
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
    ): CustomerUpdateResponse {
        $params = Util::removeNulls(
            [
                'name' => $name,
                'pickupLocationID' => $pickupLocationID,
                'regionID' => $regionID,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($customerID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * List customers
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
    ): CustomerListResponse {
        $params = Util::removeNulls(
            ['limit' => $limit, 'page' => $page, 'search' => $search]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
