<?php

declare(strict_types=1);

namespace Vibedropper\Services;

use Vibedropper\Client;
use Vibedropper\Core\Contracts\BaseResponse;
use Vibedropper\Core\Exceptions\APIException;
use Vibedropper\Pages\PageDeleteResponse;
use Vibedropper\Pages\PageGetResponse;
use Vibedropper\Pages\PageListParams;
use Vibedropper\Pages\PageListResponse;
use Vibedropper\Pages\PageUpdateParams;
use Vibedropper\Pages\PageUpdateParams\Status;
use Vibedropper\Pages\PageUpdateResponse;
use Vibedropper\RequestOptions;
use Vibedropper\ServiceContracts\PagesRawContract;

/**
 * @phpstan-import-type RequestOpts from \Vibedropper\RequestOptions
 */
final class PagesRawService implements PagesRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Get a page
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
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['pages/%1$s', $pageID],
            options: $requestOptions,
            convert: PageGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Update a page
     *
     * @param array{
     *   description?: string|null, name?: string, status?: Status|value-of<Status>
     * }|PageUpdateParams $params
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
    ): BaseResponse {
        [$parsed, $options] = PageUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'put',
            path: ['pages/%1$s', $pageID],
            body: (object) $parsed,
            options: $options,
            convert: PageUpdateResponse::class,
        );
    }

    /**
     * @api
     *
     * List pages
     *
     * @param array{
     *   limit?: int,
     *   page?: int,
     *   status?: PageListParams\Status|value-of<PageListParams\Status>,
     * }|PageListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PageListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|PageListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = PageListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'pages',
            query: $parsed,
            options: $options,
            convert: PageListResponse::class,
        );
    }

    /**
     * @api
     *
     * Delete a page
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
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['pages/%1$s', $pageID],
            options: $requestOptions,
            convert: PageDeleteResponse::class,
        );
    }
}
