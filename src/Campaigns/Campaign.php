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
 *   fromEmail?: string|null,
 *   fromName?: string|null,
 *   name?: string|null,
 *   orgID?: string|null,
 *   previewText?: string|null,
 *   replyTo?: string|null,
 *   scheduledAt?: \DateTimeInterface|null,
 *   sentAt?: \DateTimeInterface|null,
 *   status?: null|Status|value-of<Status>,
 *   subject?: string|null,
 *   totalBounces?: int|null,
 *   totalClicks?: int|null,
 *   totalOpens?: int|null,
 *   totalSent?: int|null,
 *   totalUnsubscribes?: int|null,
 *   totalViews?: int|null,
 *   uniqueClicks?: int|null,
 *   updatedAt?: \DateTimeInterface|null,
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

    #[Optional]
    public ?string $fromEmail;

    #[Optional]
    public ?string $fromName;

    #[Optional]
    public ?string $name;

    #[Optional('orgId')]
    public ?string $orgID;

    #[Optional(nullable: true)]
    public ?string $previewText;

    #[Optional(nullable: true)]
    public ?string $replyTo;

    #[Optional(nullable: true)]
    public ?\DateTimeInterface $scheduledAt;

    #[Optional(nullable: true)]
    public ?\DateTimeInterface $sentAt;

    /** @var value-of<Status>|null $status */
    #[Optional(enum: Status::class)]
    public ?string $status;

    #[Optional]
    public ?string $subject;

    #[Optional]
    public ?int $totalBounces;

    /**
     * Total click events.
     */
    #[Optional]
    public ?int $totalClicks;

    /**
     * Unique opens.
     */
    #[Optional]
    public ?int $totalOpens;

    #[Optional]
    public ?int $totalSent;

    #[Optional]
    public ?int $totalUnsubscribes;

    /**
     * Total view events (all pixel loads).
     */
    #[Optional]
    public ?int $totalViews;

    #[Optional]
    public ?int $uniqueClicks;

    #[Optional]
    public ?\DateTimeInterface $updatedAt;

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
        ?string $id = null,
        ?\DateTimeInterface $createdAt = null,
        ?string $fromEmail = null,
        ?string $fromName = null,
        ?string $name = null,
        ?string $orgID = null,
        ?string $previewText = null,
        ?string $replyTo = null,
        ?\DateTimeInterface $scheduledAt = null,
        ?\DateTimeInterface $sentAt = null,
        Status|string|null $status = null,
        ?string $subject = null,
        ?int $totalBounces = null,
        ?int $totalClicks = null,
        ?int $totalOpens = null,
        ?int $totalSent = null,
        ?int $totalUnsubscribes = null,
        ?int $totalViews = null,
        ?int $uniqueClicks = null,
        ?\DateTimeInterface $updatedAt = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $fromEmail && $self['fromEmail'] = $fromEmail;
        null !== $fromName && $self['fromName'] = $fromName;
        null !== $name && $self['name'] = $name;
        null !== $orgID && $self['orgID'] = $orgID;
        null !== $previewText && $self['previewText'] = $previewText;
        null !== $replyTo && $self['replyTo'] = $replyTo;
        null !== $scheduledAt && $self['scheduledAt'] = $scheduledAt;
        null !== $sentAt && $self['sentAt'] = $sentAt;
        null !== $status && $self['status'] = $status;
        null !== $subject && $self['subject'] = $subject;
        null !== $totalBounces && $self['totalBounces'] = $totalBounces;
        null !== $totalClicks && $self['totalClicks'] = $totalClicks;
        null !== $totalOpens && $self['totalOpens'] = $totalOpens;
        null !== $totalSent && $self['totalSent'] = $totalSent;
        null !== $totalUnsubscribes && $self['totalUnsubscribes'] = $totalUnsubscribes;
        null !== $totalViews && $self['totalViews'] = $totalViews;
        null !== $uniqueClicks && $self['uniqueClicks'] = $uniqueClicks;
        null !== $updatedAt && $self['updatedAt'] = $updatedAt;

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

    public function withFromEmail(string $fromEmail): self
    {
        $self = clone $this;
        $self['fromEmail'] = $fromEmail;

        return $self;
    }

    public function withFromName(string $fromName): self
    {
        $self = clone $this;
        $self['fromName'] = $fromName;

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

    public function withPreviewText(?string $previewText): self
    {
        $self = clone $this;
        $self['previewText'] = $previewText;

        return $self;
    }

    public function withReplyTo(?string $replyTo): self
    {
        $self = clone $this;
        $self['replyTo'] = $replyTo;

        return $self;
    }

    public function withScheduledAt(?\DateTimeInterface $scheduledAt): self
    {
        $self = clone $this;
        $self['scheduledAt'] = $scheduledAt;

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

    public function withTotalBounces(int $totalBounces): self
    {
        $self = clone $this;
        $self['totalBounces'] = $totalBounces;

        return $self;
    }

    /**
     * Total click events.
     */
    public function withTotalClicks(int $totalClicks): self
    {
        $self = clone $this;
        $self['totalClicks'] = $totalClicks;

        return $self;
    }

    /**
     * Unique opens.
     */
    public function withTotalOpens(int $totalOpens): self
    {
        $self = clone $this;
        $self['totalOpens'] = $totalOpens;

        return $self;
    }

    public function withTotalSent(int $totalSent): self
    {
        $self = clone $this;
        $self['totalSent'] = $totalSent;

        return $self;
    }

    public function withTotalUnsubscribes(int $totalUnsubscribes): self
    {
        $self = clone $this;
        $self['totalUnsubscribes'] = $totalUnsubscribes;

        return $self;
    }

    /**
     * Total view events (all pixel loads).
     */
    public function withTotalViews(int $totalViews): self
    {
        $self = clone $this;
        $self['totalViews'] = $totalViews;

        return $self;
    }

    public function withUniqueClicks(int $uniqueClicks): self
    {
        $self = clone $this;
        $self['uniqueClicks'] = $uniqueClicks;

        return $self;
    }

    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }
}
