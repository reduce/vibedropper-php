<?php

declare(strict_types=1);

namespace Vibedropper\ServiceContracts\KnowledgeBases;

use Vibedropper\Core\Contracts\BaseResponse;
use Vibedropper\Core\Exceptions\APIException;
use Vibedropper\KnowledgeBases\Articles\ArticleCreateParams;
use Vibedropper\KnowledgeBases\Articles\ArticleListParams;
use Vibedropper\KnowledgeBases\Articles\ArticleListResponse;
use Vibedropper\KnowledgeBases\Articles\ArticleNewResponse;
use Vibedropper\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Vibedropper\RequestOptions
 */
interface ArticlesRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|ArticleCreateParams $params
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|ArticleListParams $params
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
    ): BaseResponse;
}
