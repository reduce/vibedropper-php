<?php

declare(strict_types=1);

namespace Vibedropper\Lists\Subscribers;

use Vibedropper\Core\Attributes\Optional;
use Vibedropper\Core\Concerns\SdkModel;
use Vibedropper\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type SubscriberShape from \Vibedropper\Lists\Subscribers\Subscriber
 *
 * @phpstan-type SubscriberAddResponseShape = array{
 *   subscriber?: null|Subscriber|SubscriberShape
 * }
 */
final class SubscriberAddResponse implements BaseModel
{
    /** @use SdkModel<SubscriberAddResponseShape> */
    use SdkModel;

    #[Optional]
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
    public static function with(Subscriber|array|null $subscriber = null): self
    {
        $self = new self;

        null !== $subscriber && $self['subscriber'] = $subscriber;

        return $self;
    }

    /**
     * @param Subscriber|SubscriberShape $subscriber
     */
    public function withSubscriber(Subscriber|array $subscriber): self
    {
        $self = clone $this;
        $self['subscriber'] = $subscriber;

        return $self;
    }
}
