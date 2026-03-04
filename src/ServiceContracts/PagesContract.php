<?php

declare(strict_types=1);

namespace Vibedropper\ServiceContracts;

use Vibedropper\Core\Exceptions\APIException;
use Vibedropper\Pages\PageDeleteResponse;
use Vibedropper\Pages\PageGetResponse;
use Vibedropper\Pages\PageListResponse;
use Vibedropper\Pages\PageUpdateParams\Status;
use Vibedropper\Pages\PageUpdateResponse;
use Vibedropper\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Vibedropper\RequestOptions
 */
interface PagesContract
{
    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $pageID,
        RequestOptions|array|null $requestOptions = null
    ): PageGetResponse;

    /**
     * @api
     *
     * @param Status|value-of<Status> $status
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        string $pageID,
        ?string $description = null,
        ?string $name = null,
        Status|string|null $status = null,
        RequestOptions|array|null $requestOptions = null,
    ): PageUpdateResponse;

    /**
     * @api
     *
     * @param \Vibedropper\Pages\PageListParams\Status|value-of<\Vibedropper\Pages\PageListParams\Status> $status Filter by status. Omit or use "all" to return all pages.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        int $limit = 20,
        int $page = 1,
        \Vibedropper\Pages\PageListParams\Status|string|null $status = null,
        RequestOptions|array|null $requestOptions = null,
    ): PageListResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $pageID,
        RequestOptions|array|null $requestOptions = null
    ): PageDeleteResponse;
}
