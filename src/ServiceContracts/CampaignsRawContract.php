<?php

declare(strict_types=1);

namespace Vibedropper\ServiceContracts;

use Vibedropper\Campaigns\CampaignGetResponse;
use Vibedropper\Campaigns\CampaignListParams;
use Vibedropper\Campaigns\CampaignListResponse;
use Vibedropper\Core\Contracts\BaseResponse;
use Vibedropper\Core\Exceptions\APIException;
use Vibedropper\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Vibedropper\RequestOptions
 */
interface CampaignsRawContract
{
    /**
     * @api
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|CampaignListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CampaignListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|CampaignListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
