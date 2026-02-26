<?php

declare(strict_types=1);

namespace Vibedropper\Campaigns;

use Vibedropper\Campaigns\Campaign\Status;
use Vibedropper\Core\Attributes\Optional;
use Vibedropper\Core\Concerns\SdkModel;
use Vibedropper\Core\Contracts\BaseModel;

/**
 * @phpstan-type CampaignShape = array{
 *   id?: string|null,
 *   createdAt?: \DateTimeInterface|null,
 *   listIDs?: list<string>|null,
 *   name?: string|null,
 *   orgID?: string|null,
 *   sentAt?: \DateTimeInterface|null,
 *   status?: null|Status|value-of<Status>,
 *   subject?: string|null,
 * }
 */
final class Campaign implements BaseModel
{
    /** @use SdkModel<CampaignShape> */
    use SdkModel;

    #[Optional]
    public ?string $id;

    #[Optional]
    public ?\DateTimeInterface $createdAt;

    /** @var list<string>|null $listIDs */
    #[Optional('listIds', list: 'string')]
    public ?array $listIDs;

    #[Optional]
    public ?string $name;

    #[Optional('orgId')]
    public ?string $orgID;

    #[Optional(nullable: true)]
    public ?\DateTimeInterface $sentAt;

    /** @var value-of<Status>|null $status */
    #[Optional(enum: Status::class)]
    public ?string $status;

    #[Optional]
    public ?string $subject;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<string>|null $listIDs
     * @param Status|value-of<Status>|null $status
     */
    public static function with(
        ?string $id = null,
        ?\DateTimeInterface $createdAt = null,
        ?array $listIDs = null,
        ?string $name = null,
        ?string $orgID = null,
        ?\DateTimeInterface $sentAt = null,
        Status|string|null $status = null,
        ?string $subject = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $listIDs && $self['listIDs'] = $listIDs;
        null !== $name && $self['name'] = $name;
        null !== $orgID && $self['orgID'] = $orgID;
        null !== $sentAt && $self['sentAt'] = $sentAt;
        null !== $status && $self['status'] = $status;
        null !== $subject && $self['subject'] = $subject;

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
     * @param list<string> $listIDs
     */
    public function withListIDs(array $listIDs): self
    {
        $self = clone $this;
        $self['listIDs'] = $listIDs;

        return $self;
    }

    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    public function withOrgID(string $orgID): self
    {
        $self = clone $this;
        $self['orgID'] = $orgID;

        return $self;
    }

    public function withSentAt(?\DateTimeInterface $sentAt): self
    {
        $self = clone $this;
        $self['sentAt'] = $sentAt;

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

    public function withSubject(string $subject): self
    {
        $self = clone $this;
        $self['subject'] = $subject;

        return $self;
    }
}
