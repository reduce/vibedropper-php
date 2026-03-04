<?php

declare(strict_types=1);

namespace Vibedropper\Services;

use Vibedropper\Client;
use Vibedropper\Core\Contracts\BaseResponse;
use Vibedropper\Core\Exceptions\APIException;
use Vibedropper\Forms\FormDeleteResponse;
use Vibedropper\Forms\FormGetResponse;
use Vibedropper\Forms\FormListParams;
use Vibedropper\Forms\FormListResponse;
use Vibedropper\Forms\FormListSubmissionsParams;
use Vibedropper\Forms\FormListSubmissionsResponse;
use Vibedropper\Forms\FormUpdateParams;
use Vibedropper\Forms\FormUpdateParams\Status;
use Vibedropper\Forms\FormUpdateResponse;
use Vibedropper\RequestOptions;
use Vibedropper\ServiceContracts\FormsRawContract;

/**
 * Manage forms and submissions.
 *
 * @phpstan-import-type RequestOpts from \Vibedropper\RequestOptions
 */
final class FormsRawService implements FormsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Get a form
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
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['forms/%1$s', $formID],
            options: $requestOptions,
            convert: FormGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Update a form
     *
     * @param array{
     *   description?: string|null,
     *   listID?: string|null,
     *   status?: Status|value-of<Status>,
     *   successMessage?: string|null,
     *   title?: string,
     * }|FormUpdateParams $params
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
    ): BaseResponse {
        [$parsed, $options] = FormUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'put',
            path: ['forms/%1$s', $formID],
            body: (object) $parsed,
            options: $options,
            convert: FormUpdateResponse::class,
        );
    }

    /**
     * @api
     *
     * List forms
     *
     * @param array{
     *   limit?: int,
     *   page?: int,
     *   status?: FormListParams\Status|value-of<FormListParams\Status>,
     * }|FormListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<FormListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|FormListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = FormListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'forms',
            query: $parsed,
            options: $options,
            convert: FormListResponse::class,
        );
    }

    /**
     * @api
     *
     * Delete a form
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
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['forms/%1$s', $formID],
            options: $requestOptions,
            convert: FormDeleteResponse::class,
        );
    }

    /**
     * @api
     *
     * List form submissions
     *
     * @param array{limit?: int, page?: int}|FormListSubmissionsParams $params
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
    ): BaseResponse {
        [$parsed, $options] = FormListSubmissionsParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['forms/%1$s/submissions', $formID],
            query: $parsed,
            options: $options,
            convert: FormListSubmissionsResponse::class,
        );
    }
}
