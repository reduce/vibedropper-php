<?php

declare(strict_types=1);

namespace Vibedropper\ServiceContracts;

use Vibedropper\Core\Contracts\BaseResponse;
use Vibedropper\Core\Exceptions\APIException;
use Vibedropper\Pages\PageDeleteResponse;
use Vibedropper\Pages\PageGetResponse;
use Vibedropper\Pages\PageListParams;
use Vibedropper\Pages\PageListResponse;
use Vibedropper\Pages\PageUpdateParams;
use Vibedropper\Pages\PageUpdateResponse;
use Vibedropper\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Vibedropper\RequestOptions
 */
interface PagesRawContract
{
    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PageGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $pageID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|PageUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PageUpdateResponse>
     *
     * @throws APIException
     */
    public function update(
        string $pageID,
        array|PageUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|PageListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PageListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|PageListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PageDeleteResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $pageID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;
}
