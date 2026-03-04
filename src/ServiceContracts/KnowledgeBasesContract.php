<?php

declare(strict_types=1);

namespace Vibedropper\ServiceContracts;

use Vibedropper\Core\Exceptions\APIException;
use Vibedropper\KnowledgeBases\KnowledgeBaseGetResponse;
use Vibedropper\KnowledgeBases\KnowledgeBaseListResponse;
use Vibedropper\KnowledgeBases\KnowledgeBaseUpdateResponse;
use Vibedropper\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Vibedropper\RequestOptions
 */
interface KnowledgeBasesContract
{
    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $kbID,
        RequestOptions|array|null $requestOptions = null
    ): KnowledgeBaseGetResponse;

    /**
     * @api
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
    ): KnowledgeBaseUpdateResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        RequestOptions|array|null $requestOptions = null
    ): KnowledgeBaseListResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $kbID,
        RequestOptions|array|null $requestOptions = null
    ): mixed;
}
