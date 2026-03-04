<?php

declare(strict_types=1);

namespace Vibedropper\Services;

use Vibedropper\Client;
use Vibedropper\Core\Contracts\BaseResponse;
use Vibedropper\Core\Exceptions\APIException;
use Vibedropper\KnowledgeBases\KnowledgeBaseGetResponse;
use Vibedropper\KnowledgeBases\KnowledgeBaseListResponse;
use Vibedropper\KnowledgeBases\KnowledgeBaseUpdateParams;
use Vibedropper\KnowledgeBases\KnowledgeBaseUpdateResponse;
use Vibedropper\RequestOptions;
use Vibedropper\ServiceContracts\KnowledgeBasesRawContract;

/**
 * @phpstan-import-type RequestOpts from \Vibedropper\RequestOptions
 */
final class KnowledgeBasesRawService implements KnowledgeBasesRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Get a knowledge base
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<KnowledgeBaseGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $kbID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['knowledge-bases/%1$s', $kbID],
            options: $requestOptions,
            convert: KnowledgeBaseGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Update a knowledge base
     *
     * @param array{
     *   description?: string|null, name?: string, sortOrder?: int
     * }|KnowledgeBaseUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<KnowledgeBaseUpdateResponse>
     *
     * @throws APIException
     */
    public function update(
        string $kbID,
        array|KnowledgeBaseUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = KnowledgeBaseUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'patch',
            path: ['knowledge-bases/%1$s', $kbID],
            body: (object) $parsed,
            options: $options,
            convert: KnowledgeBaseUpdateResponse::class,
        );
    }

    /**
     * @api
     *
     * Returns all knowledge bases ordered by sortOrder then creation date.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<KnowledgeBaseListResponse>
     *
     * @throws APIException
     */
    public function list(
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'knowledge-bases',
            options: $requestOptions,
            convert: KnowledgeBaseListResponse::class,
        );
    }

    /**
     * @api
     *
     * Delete a knowledge base
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $kbID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['knowledge-bases/%1$s', $kbID],
            options: $requestOptions,
            convert: null,
        );
    }
}
