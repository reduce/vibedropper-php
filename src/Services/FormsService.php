<?php

declare(strict_types=1);

namespace Vibedropper\Services;

use Vibedropper\Client;
use Vibedropper\Core\Exceptions\APIException;
use Vibedropper\Core\Util;
use Vibedropper\Forms\FormDeleteResponse;
use Vibedropper\Forms\FormGetResponse;
use Vibedropper\Forms\FormListResponse;
use Vibedropper\Forms\FormListSubmissionsResponse;
use Vibedropper\Forms\FormUpdateParams\Status;
use Vibedropper\Forms\FormUpdateResponse;
use Vibedropper\RequestOptions;
use Vibedropper\ServiceContracts\FormsContract;

/**
 * Manage forms and submissions.
 *
 * @phpstan-import-type RequestOpts from \Vibedropper\RequestOptions
 */
final class FormsService implements FormsContract
{
    /**
     * @api
     */
    public FormsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new FormsRawService($client);
    }

    /**
     * @api
     *
     * Get a form
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $formID,
        RequestOptions|array|null $requestOptions = null
    ): FormGetResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($formID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Update a form
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
    ): FormUpdateResponse {
        $params = Util::removeNulls(
            [
                'description' => $description,
                'listID' => $listID,
                'status' => $status,
                'successMessage' => $successMessage,
                'title' => $title,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($formID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * List forms
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
    ): FormListResponse {
        $params = Util::removeNulls(
            ['limit' => $limit, 'page' => $page, 'status' => $status]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Delete a form
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $formID,
        RequestOptions|array|null $requestOptions = null
    ): FormDeleteResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($formID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * List form submissions
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
    ): FormListSubmissionsResponse {
        $params = Util::removeNulls(['limit' => $limit, 'page' => $page]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->listSubmissions($formID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
