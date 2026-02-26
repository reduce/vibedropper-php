<?php

declare(strict_types=1);

namespace Vibedropper\ServiceContracts\Lists;

use Vibedropper\Core\Contracts\BaseResponse;
use Vibedropper\Core\Exceptions\APIException;
use Vibedropper\Lists\Subscribers\SubscriberAddParams;
use Vibedropper\Lists\Subscribers\SubscriberAddResponse;
use Vibedropper\Lists\Subscribers\SubscriberListResponse;
use Vibedropper\Lists\Subscribers\SubscriberRemoveParams;
use Vibedropper\Lists\Subscribers\SubscriberRemoveResponse;
use Vibedropper\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Vibedropper\RequestOptions
 */
interface SubscribersRawContract
{
    /**
     * @api
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|SubscriberAddParams $params
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|SubscriberRemoveParams $params
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
    ): BaseResponse;
}
