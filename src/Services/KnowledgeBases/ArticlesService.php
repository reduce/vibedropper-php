<?php

declare(strict_types=1);

namespace Vibedropper\Services\KnowledgeBases;

use Vibedropper\Client;
use Vibedropper\Core\Exceptions\APIException;
use Vibedropper\Core\Util;
use Vibedropper\KnowledgeBases\Articles\ArticleListResponse;
use Vibedropper\KnowledgeBases\Articles\ArticleNewResponse;
use Vibedropper\RequestOptions;
use Vibedropper\ServiceContracts\KnowledgeBases\ArticlesContract;

/**
 * @phpstan-import-type RequestOpts from \Vibedropper\RequestOptions
 */
final class ArticlesService implements ArticlesContract
{
    /**
     * @api
     */
    public ArticlesRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new ArticlesRawService($client);
    }

    /**
     * @api
     *
     * Create an article
     *
     * @param string $content HTML content
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $kbID,
        string $title,
        ?string $categoryID = null,
        ?string $content = null,
        ?string $excerpt = null,
        bool $published = true,
        RequestOptions|array|null $requestOptions = null,
    ): ArticleNewResponse {
        $params = Util::removeNulls(
            [
                'title' => $title,
                'categoryID' => $categoryID,
                'content' => $content,
                'excerpt' => $excerpt,
                'published' => $published,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create($kbID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * List articles in a knowledge base
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        string $kbID,
        int $limit = 20,
        int $page = 1,
        RequestOptions|array|null $requestOptions = null,
    ): ArticleListResponse {
        $params = Util::removeNulls(['limit' => $limit, 'page' => $page]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list($kbID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
