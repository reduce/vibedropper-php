<?php

declare(strict_types=1);

namespace Vibedropper\ServiceContracts\Lists;

use Vibedropper\Core\Exceptions\APIException;
use Vibedropper\Lists\Subscribers\SubscriberAddResponse;
use Vibedropper\Lists\Subscribers\SubscriberListResponse;
use Vibedropper\Lists\Subscribers\SubscriberRemoveResponse;
use Vibedropper\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Vibedropper\RequestOptions
 */
interface SubscribersContract
{
    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        string $listID,
        RequestOptions|array|null $requestOptions = null
    ): SubscriberListResponse;

    /**
     * @api
     *
     * @param mixed $customFields Arbitrary key-value metadata
     * @param string $pickupLocationID Pickup location ID (must belong to the given regionId)
     * @param string $regionID Region ID to assign to the customer
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
    ): SubscriberAddResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function remove(
        string $subscriberID,
        string $listID,
        RequestOptions|array|null $requestOptions = null,
    ): SubscriberRemoveResponse;
}
