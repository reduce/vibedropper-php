<?php

declare(strict_types=1);

namespace Vibedropper\Services\Lists;

use Vibedropper\Client;
use Vibedropper\Core\Contracts\BaseResponse;
use Vibedropper\Core\Exceptions\APIException;
use Vibedropper\Lists\Subscribers\SubscriberAddParams;
use Vibedropper\Lists\Subscribers\SubscriberAddResponse;
use Vibedropper\Lists\Subscribers\SubscriberListResponse;
use Vibedropper\Lists\Subscribers\SubscriberRemoveParams;
use Vibedropper\Lists\Subscribers\SubscriberRemoveResponse;
use Vibedropper\RequestOptions;
use Vibedropper\ServiceContracts\Lists\SubscribersRawContract;

/**
 * @phpstan-import-type RequestOpts from \Vibedropper\RequestOptions
 */
final class SubscribersRawService implements SubscribersRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * List subscribers
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SubscriberListResponse>
     *
     * @throws APIException
     */
    public function list(
        string $listID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['lists/%1$s/subscribers', $listID],
            options: $requestOptions,
            convert: SubscriberListResponse::class,
        );
    }

    /**
     * @api
     *
     * Add subscriber
     *
     * @param array{
     *   email: string,
     *   customFields?: mixed,
     *   name?: string,
     *   pickupLocationID?: string,
     *   regionID?: string,
     * }|SubscriberAddParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SubscriberAddResponse>
     *
     * @throws APIException
     */
    public function add(
        string $listID,
        array|SubscriberAddParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = SubscriberAddParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['lists/%1$s/subscribers', $listID],
            body: (object) $parsed,
            options: $options,
            convert: SubscriberAddResponse::class,
        );
    }

    /**
     * @api
     *
     * Remove subscriber
     *
     * @param array{listID: string}|SubscriberRemoveParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SubscriberRemoveResponse>
     *
     * @throws APIException
     */
    public function remove(
        string $subscriberID,
        array|SubscriberRemoveParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = SubscriberRemoveParams::parseRequest(
            $params,
            $requestOptions,
        );
        $listID = $parsed['listID'];
        unset($parsed['listID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['lists/%1$s/subscribers/%2$s', $listID, $subscriberID],
            options: $options,
            convert: SubscriberRemoveResponse::class,
        );
    }
}
