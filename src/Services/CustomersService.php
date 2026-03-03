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
        RequestOptions|array|null $requestOptions = null,
    ): CustomerUpdateResponse {
        $params = Util::removeNulls(
            [
                'addressLine1' => $addressLine1,
                'addressLine2' => $addressLine2,
                'city' => $city,
                'country' => $country,
                'firstName' => $firstName,
                'lastName' => $lastName,
                'name' => $name,
                'pickupLocationID' => $pickupLocationID,
                'postalCode' => $postalCode,
                'regionID' => $regionID,
                'state' => $state,
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
     * @param string $search Search by name or email
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
