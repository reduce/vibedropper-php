<?php

declare(strict_types=1);

namespace Vibedropper\Services;

use Vibedropper\Client;
use Vibedropper\Core\Contracts\BaseResponse;
use Vibedropper\Core\Exceptions\APIException;
use Vibedropper\Customers\CustomerGetResponse;
use Vibedropper\Customers\CustomerListParams;
use Vibedropper\Customers\CustomerListResponse;
use Vibedropper\Customers\CustomerUpdateParams;
use Vibedropper\Customers\CustomerUpdateResponse;
use Vibedropper\RequestOptions;
use Vibedropper\ServiceContracts\CustomersRawContract;

/**
 * @phpstan-import-type RequestOpts from \Vibedropper\RequestOptions
 */
final class CustomersRawService implements CustomersRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Get customer
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CustomerGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $customerID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['customers/%1$s', $customerID],
            options: $requestOptions,
            convert: CustomerGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Update customer
     *
     * @param array{
     *   name?: string, pickupLocationID?: string|null, regionID?: string|null
     * }|CustomerUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CustomerUpdateResponse>
     *
     * @throws APIException
     */
    public function update(
        string $customerID,
        array|CustomerUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = CustomerUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'patch',
            path: ['customers/%1$s', $customerID],
            body: (object) $parsed,
            options: $options,
            convert: CustomerUpdateResponse::class,
        );
    }

    /**
     * @api
     *
     * List customers
     *
     * @param array{
     *   limit?: int, page?: int, search?: string
     * }|CustomerListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CustomerListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|CustomerListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = CustomerListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'customers',
            query: $parsed,
            options: $options,
            convert: CustomerListResponse::class,
        );
    }
}
