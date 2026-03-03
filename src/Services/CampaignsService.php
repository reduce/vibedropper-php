<?php

declare(strict_types=1);

namespace Vibedropper\Services;

use Vibedropper\Campaigns\CampaignGetResponse;
use Vibedropper\Campaigns\CampaignListResponse;
use Vibedropper\Client;
use Vibedropper\Core\Exceptions\APIException;
use Vibedropper\Core\Util;
use Vibedropper\RequestOptions;
use Vibedropper\ServiceContracts\CampaignsContract;

/**
 * @phpstan-import-type RequestOpts from \Vibedropper\RequestOptions
 */
final class CampaignsService implements CampaignsContract
{
    /**
     * @api
     */
    public CampaignsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new CampaignsRawService($client);
    }

    /**
     * @api
     *
     * Get campaign
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $campaignID,
        RequestOptions|array|null $requestOptions = null
    ): CampaignGetResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($campaignID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * List campaigns
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        int $limit = 20,
        int $page = 1,
        RequestOptions|array|null $requestOptions = null,
    ): CampaignListResponse {
        $params = Util::removeNulls(['limit' => $limit, 'page' => $page]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
