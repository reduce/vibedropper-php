<?php

declare(strict_types=1);

namespace Vibedropper\ServiceContracts;

use Vibedropper\Core\Contracts\BaseResponse;
use Vibedropper\Core\Exceptions\APIException;
use Vibedropper\KnowledgeBases\KnowledgeBaseGetResponse;
use Vibedropper\KnowledgeBases\KnowledgeBaseListResponse;
use Vibedropper\KnowledgeBases\KnowledgeBaseUpdateParams;
use Vibedropper\KnowledgeBases\KnowledgeBaseUpdateResponse;
use Vibedropper\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Vibedropper\RequestOptions
 */
interface KnowledgeBasesRawContract
{
    /**
     * @api
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|KnowledgeBaseUpdateParams $params
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<KnowledgeBaseListResponse>
     *
     * @throws APIException
     */
    public function list(
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
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
    ): BaseResponse;
}
