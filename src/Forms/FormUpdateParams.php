<?php

declare(strict_types=1);

namespace Vibedropper\Forms;

use Vibedropper\Core\Attributes\Optional;
use Vibedropper\Core\Concerns\SdkModel;
use Vibedropper\Core\Concerns\SdkParams;
use Vibedropper\Core\Contracts\BaseModel;
use Vibedropper\Forms\FormUpdateParams\Status;

/**
 * Update a form.
 *
 * @see Vibedropper\Services\FormsService::update()
 *
 * @phpstan-type FormUpdateParamsShape = array{
 *   description?: string|null,
 *   listID?: string|null,
 *   status?: null|Status|value-of<Status>,
 *   successMessage?: string|null,
 *   title?: string|null,
 * }
 */
final class FormUpdateParams implements BaseModel
{
    /** @use SdkModel<FormUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Optional(nullable: true)]
    public ?string $description;

    /**
     * List to subscribe form submitters to.
     */
    #[Optional('listId', nullable: true)]
    public ?string $listID;

    /** @var value-of<Status>|null $status */
    #[Optional(enum: Status::class)]
    public ?string $status;

    #[Optional(nullable: true)]
    public ?string $successMessage;

    #[Optional]
    public ?string $title;

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
        ?string $description = null,
        ?string $listID = null,
        Status|string|null $status = null,
        ?string $successMessage = null,
        ?string $title = null,
    ): self {
        $self = new self;

        null !== $description && $self['description'] = $description;
        null !== $listID && $self['listID'] = $listID;
        null !== $status && $self['status'] = $status;
        null !== $successMessage && $self['successMessage'] = $successMessage;
        null !== $title && $self['title'] = $title;

        return $self;
    }

    public function withDescription(?string $description): self
    {
        $self = clone $this;
        $self['description'] = $description;

        return $self;
    }

    /**
     * List to subscribe form submitters to.
     */
    public function withListID(?string $listID): self
    {
        $self = clone $this;
        $self['listID'] = $listID;

        return $self;
    }

    /**
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }

    public function withSuccessMessage(?string $successMessage): self
    {
        $self = clone $this;
        $self['successMessage'] = $successMessage;

        return $self;
    }

    public function withTitle(string $title): self
    {
        $self = clone $this;
        $self['title'] = $title;

        return $self;
    }
}
