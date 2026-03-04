<?php

declare(strict_types=1);

namespace Vibedropper\Services;

use Vibedropper\Client;
use Vibedropper\Core\Exceptions\APIException;
use Vibedropper\Core\Util;
use Vibedropper\Pages\PageDeleteResponse;
use Vibedropper\Pages\PageGetResponse;
use Vibedropper\Pages\PageListResponse;
use Vibedropper\Pages\PageUpdateParams\Status;
use Vibedropper\Pages\PageUpdateResponse;
use Vibedropper\RequestOptions;
use Vibedropper\ServiceContracts\PagesContract;

/**
 * Manage landing pages.
 *
 * @phpstan-import-type RequestOpts from \Vibedropper\RequestOptions
 */
final class PagesService implements PagesContract
{
    /**
     * @api
     */
    public PagesRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new PagesRawService($client);
    }

    /**
     * @api
     *
     * Get a page
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $pageID,
        RequestOptions|array|null $requestOptions = null
    ): PageGetResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($pageID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Update a page
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
    ): PageUpdateResponse {
        $params = Util::removeNulls(
            ['description' => $description, 'name' => $name, 'status' => $status]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($pageID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * List pages
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
    ): PageListResponse {
        $params = Util::removeNulls(
            ['limit' => $limit, 'page' => $page, 'status' => $status]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Delete a page
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $pageID,
        RequestOptions|array|null $requestOptions = null
    ): PageDeleteResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($pageID, requestOptions: $requestOptions);

        return $response->parse();
    }
}
