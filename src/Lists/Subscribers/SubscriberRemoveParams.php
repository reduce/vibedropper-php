<?php

declare(strict_types=1);

namespace Vibedropper\Lists\Subscribers;

use Vibedropper\Core\Attributes\Required;
use Vibedropper\Core\Concerns\SdkModel;
use Vibedropper\Core\Concerns\SdkParams;
use Vibedropper\Core\Contracts\BaseModel;

/**
 * Remove subscriber.
 *
 * @see Vibedropper\Services\Lists\SubscribersService::remove()
 *
 * @phpstan-type SubscriberRemoveParamsShape = array{listID: string}
 */
final class SubscriberRemoveParams implements BaseModel
{
    /** @use SdkModel<SubscriberRemoveParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $listID;

    /**
     * `new SubscriberRemoveParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SubscriberRemoveParams::with(listID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SubscriberRemoveParams)->withListID(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(string $listID): self
    {
        $self = new self;

        $self['listID'] = $listID;

        return $self;
    }

    public function withListID(string $listID): self
    {
        $self = clone $this;
        $self['listID'] = $listID;

        return $self;
    }
}
