<?php

declare(strict_types=1);

namespace Vibedropper\Forms\FormListSubmissionsResponse;

use Vibedropper\Core\Attributes\Optional;
use Vibedropper\Core\Concerns\SdkModel;
use Vibedropper\Core\Contracts\BaseModel;
use Vibedropper\Forms\FormListSubmissionsResponse\Submission\Subscriber;

/**
 * @phpstan-import-type SubscriberShape from \Vibedropper\Forms\FormListSubmissionsResponse\Submission\Subscriber
 *
 * @phpstan-type SubmissionShape = array{
 *   id?: string|null,
 *   createdAt?: \DateTimeInterface|null,
 *   data?: mixed,
 *   formID?: string|null,
 *   subscriber?: null|Subscriber|SubscriberShape,
 * }
 */
final class Submission implements BaseModel
{
    /** @use SdkModel<SubmissionShape> */
    use SdkModel;

    #[Optional]
    public ?string $id;

    #[Optional]
    public ?\DateTimeInterface $createdAt;

    /**
     * Key-value pairs of submitted form fields.
     */
    #[Optional]
    public mixed $data;

    #[Optional('formId')]
    public ?string $formID;

    #[Optional(nullable: true)]
    public ?Subscriber $subscriber;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Subscriber|SubscriberShape|null $subscriber
     */
    public static function with(
        ?string $id = null,
        ?\DateTimeInterface $createdAt = null,
        mixed $data = null,
        ?string $formID = null,
        Subscriber|array|null $subscriber = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $data && $self['data'] = $data;
        null !== $formID && $self['formID'] = $formID;
        null !== $subscriber && $self['subscriber'] = $subscriber;

        return $self;
    }

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * Key-value pairs of submitted form fields.
     */
    public function withData(mixed $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }

    public function withFormID(string $formID): self
    {
        $self = clone $this;
        $self['formID'] = $formID;

        return $self;
    }

    /**
     * @param Subscriber|SubscriberShape|null $subscriber
     */
    public function withSubscriber(Subscriber|array|null $subscriber): self
    {
        $self = clone $this;
        $self['subscriber'] = $subscriber;

        return $self;
    }
}
