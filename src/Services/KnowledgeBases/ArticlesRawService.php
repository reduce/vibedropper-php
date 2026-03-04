<?php

declare(strict_types=1);

namespace Vibedropper\Services\KnowledgeBases;

use Vibedropper\Client;
use Vibedropper\Core\Contracts\BaseResponse;
use Vibedropper\Core\Exceptions\APIException;
use Vibedropper\KnowledgeBases\Articles\ArticleCreateParams;
use Vibedropper\KnowledgeBases\Articles\ArticleListParams;
use Vibedropper\KnowledgeBases\Articles\ArticleListResponse;
use Vibedropper\KnowledgeBases\Articles\ArticleNewResponse;
use Vibedropper\RequestOptions;
use Vibedropper\ServiceContracts\KnowledgeBases\ArticlesRawContract;

/**
 * @phpstan-import-type RequestOpts from \Vibedropper\RequestOptions
 */
final class ArticlesRawService implements ArticlesRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Create an article
     *
     * @param array{
     *   title: string,
     *   categoryID?: string|null,
     *   content?: string,
     *   excerpt?: string|null,
     *   published?: bool,
     * }|ArticleCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ArticleNewResponse>
     *
     * @throws APIException
     */
    public function create(
        string $kbID,
        array|ArticleCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ArticleCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['knowledge-bases/%1$s/articles', $kbID],
            body: (object) $parsed,
            options: $options,
            convert: ArticleNewResponse::class,
        );
    }

    /**
     * @api
     *
     * List articles in a knowledge base
     *
     * @param array{limit?: int, page?: int}|ArticleListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ArticleListResponse>
     *
     * @throws APIException
     */
    public function list(
        string $kbID,
        array|ArticleListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ArticleListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['knowledge-bases/%1$s/articles', $kbID],
            query: $parsed,
            options: $options,
            convert: ArticleListResponse::class,
        );
    }
}
