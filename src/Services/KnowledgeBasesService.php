<?php

declare(strict_types=1);

namespace Vibedropper\Services;

use Vibedropper\Client;
use Vibedropper\Core\Exceptions\APIException;
use Vibedropper\Core\Util;
use Vibedropper\KnowledgeBases\KnowledgeBaseGetResponse;
use Vibedropper\KnowledgeBases\KnowledgeBaseListResponse;
use Vibedropper\KnowledgeBases\KnowledgeBaseUpdateResponse;
use Vibedropper\RequestOptions;
use Vibedropper\ServiceContracts\KnowledgeBasesContract;
use Vibedropper\Services\KnowledgeBases\ArticlesService;

/**
 * @phpstan-import-type RequestOpts from \Vibedropper\RequestOptions
 */
final class KnowledgeBasesService implements KnowledgeBasesContract
{
    /**
     * @api
     */
    public KnowledgeBasesRawService $raw;

    /**
     * @api
     */
    public ArticlesService $articles;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new KnowledgeBasesRawService($client);
        $this->articles = new ArticlesService($client);
    }

    /**
     * @api
     *
     * Get a knowledge base
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $kbID,
        RequestOptions|array|null $requestOptions = null
    ): KnowledgeBaseGetResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($kbID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Update a knowledge base
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        string $kbID,
        ?string $description = null,
        ?string $name = null,
        ?int $sortOrder = null,
        RequestOptions|array|null $requestOptions = null,
    ): KnowledgeBaseUpdateResponse {
        $params = Util::removeNulls(
            [
                'description' => $description,
                'name' => $name,
                'sortOrder' => $sortOrder,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($kbID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * List knowledge bases
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        RequestOptions|array|null $requestOptions = null
    ): KnowledgeBaseListResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Delete a knowledge base
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $kbID,
        RequestOptions|array|null $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($kbID, requestOptions: $requestOptions);

        return $response->parse();
    }
}
