<?php

declare(strict_types=1);

namespace Vibedropper\ServiceContracts;

use Vibedropper\Core\Exceptions\APIException;
use Vibedropper\Forms\FormDeleteResponse;
use Vibedropper\Forms\FormGetResponse;
use Vibedropper\Forms\FormListResponse;
use Vibedropper\Forms\FormListSubmissionsResponse;
use Vibedropper\Forms\FormUpdateParams\Status;
use Vibedropper\Forms\FormUpdateResponse;
use Vibedropper\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Vibedropper\RequestOptions
 */
interface FormsContract
{
    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $formID,
        RequestOptions|array|null $requestOptions = null
    ): FormGetResponse;

    /**
     * @api
     *
     * @param string|null $listID List to subscribe form submitters to
     * @param Status|value-of<Status> $status
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        string $formID,
        ?string $description = null,
        ?string $listID = null,
        Status|string|null $status = null,
        ?string $successMessage = null,
        ?string $title = null,
        RequestOptions|array|null $requestOptions = null,
    ): FormUpdateResponse;

    /**
     * @api
     *
     * @param \Vibedropper\Forms\FormListParams\Status|value-of<\Vibedropper\Forms\FormListParams\Status> $status Filter by status. Omit or use "all" to return all forms.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        int $limit = 20,
        int $page = 1,
        \Vibedropper\Forms\FormListParams\Status|string|null $status = null,
        RequestOptions|array|null $requestOptions = null,
    ): FormListResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $formID,
        RequestOptions|array|null $requestOptions = null
    ): FormDeleteResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function listSubmissions(
        string $formID,
        int $limit = 20,
        int $page = 1,
        RequestOptions|array|null $requestOptions = null,
    ): FormListSubmissionsResponse;
}
