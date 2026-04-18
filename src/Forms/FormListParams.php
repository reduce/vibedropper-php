<?php

declare(strict_types=1);

namespace Vibedropper\Forms;

use Vibedropper\Core\Attributes\Optional;
use Vibedropper\Core\Concerns\SdkModel;
use Vibedropper\Core\Concerns\SdkParams;
use Vibedropper\Core\Contracts\BaseModel;
use Vibedropper\Forms\FormListParams\Status;

/**
 * List forms.
 *
 * @see Vibedropper\Services\FormsService::list()
 *
 * @phpstan-type FormListParamsShape = array{
 *   limit?: int|null, page?: int|null, status?: null|Status|value-of<Status>
 * }
 */
final class FormListParams implements BaseModel
{
    /** @use SdkModel<FormListParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Optional]
    public ?int $limit;

    #[Optional]
    public ?int $page;

    /**
     * Filter by status. Omit or use "all" to return all forms.
     *
     * @var value-of<Status>|null $status
     */
    #[Optional(enum: Status::class)]
    public ?string $status;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Status|value-of<Status>|null $status
     */
    public static function with(
        ?int $limit = null,
        ?int $page = null,
        Status|string|null $status = null
    ): self {
        $self = new self;

        null !== $limit && $self['limit'] = $limit;
        null !== $page && $self['page'] = $page;
        null !== $status && $self['status'] = $status;

        return $self;
    }

    public function withLimit(int $limit): self
    {
        $self = clone $this;
        $self['limit'] = $limit;

        return $self;
    }

    public function withPage(int $page): self
    {
        $self = clone $this;
        $self['page'] = $page;

        return $self;
    }

    /**
     * Filter by status. Omit or use "all" to return all forms.
     *
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }
}
