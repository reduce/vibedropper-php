<?php

declare(strict_types=1);

namespace Vibedropper\Campaigns;

use Vibedropper\Core\Attributes\Optional;
use Vibedropper\Core\Concerns\SdkModel;
use Vibedropper\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type CampaignShape from \Vibedropper\Campaigns\Campaign
 *
 * @phpstan-type CampaignGetResponseShape = array{
 *   campaign?: null|Campaign|CampaignShape
 * }
 */
final class CampaignGetResponse implements BaseModel
{
    /** @use SdkModel<CampaignGetResponseShape> */
    use SdkModel;

    #[Optional]
    public ?Campaign $campaign;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Campaign|CampaignShape|null $campaign
     */
    public static function with(Campaign|array|null $campaign = null): self
    {
        $self = new self;

        null !== $campaign && $self['campaign'] = $campaign;

        return $self;
    }

    /**
     * @param Campaign|CampaignShape $campaign
     */
    public function withCampaign(Campaign|array $campaign): self
    {
        $self = clone $this;
        $self['campaign'] = $campaign;

        return $self;
    }
}
