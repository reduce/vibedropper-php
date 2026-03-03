<?php

declare(strict_types=1);

namespace Vibedropper\Services;

use Vibedropper\Campaigns\CampaignGetResponse;
use Vibedropper\Campaigns\CampaignListParams;
use Vibedropper\Campaigns\CampaignListResponse;
use Vibedropper\Client;
use Vibedropper\Core\Contracts\BaseResponse;
use Vibedropper\Core\Exceptions\APIException;
use Vibedropper\RequestOptions;
use Vibedropper\ServiceContracts\CampaignsRawContract;

/**
 * @phpstan-import-type RequestOpts from \Vibedropper\RequestOptions
 */
final class CampaignsRawService implements CampaignsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Get campaign
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CampaignGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $campaignID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['campaigns/%1$s', $campaignID],
            options: $requestOptions,
            convert: CampaignGetResponse::class,
        );
    }

    /**
     * @api
     *
     * List campaigns
     *
     * @param array{limit?: int, page?: int}|CampaignListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CampaignListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|CampaignListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = CampaignListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'campaigns',
            query: $parsed,
            options: $options,
            convert: CampaignListResponse::class,
        );
    }
}
