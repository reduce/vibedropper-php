<?php

declare(strict_types=1);

namespace Vibedropper\Services;

use Vibedropper\Campaigns\CampaignGetResponse;
use Vibedropper\Campaigns\CampaignListResponse;
use Vibedropper\Client;
use Vibedropper\Core\Exceptions\APIException;
use Vibedropper\RequestOptions;
use Vibedropper\ServiceContracts\CampaignsContract;

/**
 * Access email campaigns (read-only).
 *
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
     * Get a campaign
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
     * Returns all campaigns for the organization ordered by creation date descending. No pagination.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        RequestOptions|array|null $requestOptions = null
    ): CampaignListResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(requestOptions: $requestOptions);

        return $response->parse();
    }
}
