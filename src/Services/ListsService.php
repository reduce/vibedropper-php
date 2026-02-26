<?php

declare(strict_types=1);

namespace Vibedropper\Services;

use Vibedropper\Client;
use Vibedropper\Core\Exceptions\APIException;
use Vibedropper\Core\Util;
use Vibedropper\Lists\ListGetResponse;
use Vibedropper\Lists\ListListResponse;
use Vibedropper\RequestOptions;
use Vibedropper\ServiceContracts\ListsContract;
use Vibedropper\Services\Lists\SubscribersService;

/**
 * @phpstan-import-type RequestOpts from \Vibedropper\RequestOptions
 */
final class ListsService implements ListsContract
{
    /**
     * @api
     */
    public ListsRawService $raw;

    /**
     * @api
     */
    public SubscribersService $subscribers;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new ListsRawService($client);
        $this->subscribers = new SubscribersService($client);
    }

    /**
     * @api
     *
     * Get a list
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $listID,
        RequestOptions|array|null $requestOptions = null
    ): ListGetResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($listID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * List lists
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        int $limit = 20,
        int $page = 1,
        RequestOptions|array|null $requestOptions = null,
    ): ListListResponse {
        $params = Util::removeNulls(['limit' => $limit, 'page' => $page]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
