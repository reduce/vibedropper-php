<?php

declare(strict_types=1);

namespace Vibedropper\Services\Lists;

use Vibedropper\Client;
use Vibedropper\Core\Exceptions\APIException;
use Vibedropper\Core\Util;
use Vibedropper\Lists\Subscribers\SubscriberAddResponse;
use Vibedropper\Lists\Subscribers\SubscriberListResponse;
use Vibedropper\Lists\Subscribers\SubscriberRemoveResponse;
use Vibedropper\RequestOptions;
use Vibedropper\ServiceContracts\Lists\SubscribersContract;

/**
 * @phpstan-import-type RequestOpts from \Vibedropper\RequestOptions
 */
final class SubscribersService implements SubscribersContract
{
    /**
     * @api
     */
    public SubscribersRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new SubscribersRawService($client);
    }

    /**
     * @api
     *
     * List subscribers
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        string $listID,
        RequestOptions|array|null $requestOptions = null
    ): SubscriberListResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list($listID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Add subscriber
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function add(
        string $listID,
        string $email,
        mixed $customFields = null,
        ?string $name = null,
        ?string $pickupLocationID = null,
        ?string $regionID = null,
        RequestOptions|array|null $requestOptions = null,
    ): SubscriberAddResponse {
        $params = Util::removeNulls(
            [
                'email' => $email,
                'customFields' => $customFields,
                'name' => $name,
                'pickupLocationID' => $pickupLocationID,
                'regionID' => $regionID,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->add($listID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Remove subscriber
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function remove(
        string $subscriberID,
        string $listID,
        RequestOptions|array|null $requestOptions = null,
    ): SubscriberRemoveResponse {
        $params = Util::removeNulls(['listID' => $listID]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->remove($subscriberID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
