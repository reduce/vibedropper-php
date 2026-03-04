<?php

declare(strict_types=1);

namespace Vibedropper\ServiceContracts;

use Vibedropper\Core\Contracts\BaseResponse;
use Vibedropper\Core\Exceptions\APIException;
use Vibedropper\Forms\FormDeleteResponse;
use Vibedropper\Forms\FormGetResponse;
use Vibedropper\Forms\FormListParams;
use Vibedropper\Forms\FormListResponse;
use Vibedropper\Forms\FormListSubmissionsParams;
use Vibedropper\Forms\FormListSubmissionsResponse;
use Vibedropper\Forms\FormUpdateParams;
use Vibedropper\Forms\FormUpdateResponse;
use Vibedropper\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Vibedropper\RequestOptions
 */
interface FormsRawContract
{
    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<FormGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $formID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|FormUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<FormUpdateResponse>
     *
     * @throws APIException
     */
    public function update(
        string $formID,
        array|FormUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|FormListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<FormListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|FormListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<FormDeleteResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $formID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|FormListSubmissionsParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<FormListSubmissionsResponse>
     *
     * @throws APIException
     */
    public function listSubmissions(
        string $formID,
        array|FormListSubmissionsParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
