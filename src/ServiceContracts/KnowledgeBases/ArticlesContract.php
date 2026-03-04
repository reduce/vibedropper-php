<?php

declare(strict_types=1);

namespace Vibedropper\ServiceContracts\KnowledgeBases;

use Vibedropper\Core\Exceptions\APIException;
use Vibedropper\KnowledgeBases\Articles\ArticleListResponse;
use Vibedropper\KnowledgeBases\Articles\ArticleNewResponse;
use Vibedropper\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Vibedropper\RequestOptions
 */
interface ArticlesContract
{
    /**
     * @api
     *
     * @param string $content HTML or markdown content
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
    ): ArticleNewResponse;

    /**
     * @api
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
    ): ArticleListResponse;
}
