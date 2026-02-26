<?php

declare(strict_types=1);

namespace Vibedropper\Campaigns;

use Vibedropper\Core\Attributes\Optional;
use Vibedropper\Core\Concerns\SdkModel;
use Vibedropper\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type CampaignShape from \Vibedropper\Campaigns\Campaign
 *
 * @phpstan-type CampaignListResponseShape = array{
 *   campaigns?: list<Campaign|CampaignShape>|null
 * }
 */
final class CampaignListResponse implements BaseModel
{
    /** @use SdkModel<CampaignListResponseShape> */
    use SdkModel;

    /** @var list<Campaign>|null $campaigns */
    #[Optional(list: Campaign::class)]
    public ?array $campaigns;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<Campaign|CampaignShape>|null $campaigns
     */
    public static function with(?array $campaigns = null): self
    {
        $self = new self;

        null !== $campaigns && $self['campaigns'] = $campaigns;

        return $self;
    }

    /**
     * @param list<Campaign|CampaignShape> $campaigns
     */
    public function withCampaigns(array $campaigns): self
    {
        $self = clone $this;
        $self['campaigns'] = $campaigns;

        return $self;
    }
}
