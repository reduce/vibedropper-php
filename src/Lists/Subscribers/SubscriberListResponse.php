<?php

declare(strict_types=1);

namespace Vibedropper\Lists\Subscribers;

use Vibedropper\Core\Attributes\Optional;
use Vibedropper\Core\Concerns\SdkModel;
use Vibedropper\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type SubscriberShape from \Vibedropper\Lists\Subscribers\Subscriber
 *
 * @phpstan-type SubscriberListResponseShape = array{
 *   subscribers?: list<Subscriber|SubscriberShape>|null
 * }
 */
final class SubscriberListResponse implements BaseModel
{
    /** @use SdkModel<SubscriberListResponseShape> */
    use SdkModel;

    /** @var list<Subscriber>|null $subscribers */
    #[Optional(list: Subscriber::class)]
    public ?array $subscribers;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<Subscriber|SubscriberShape>|null $subscribers
     */
    public static function with(?array $subscribers = null): self
    {
        $self = new self;

        null !== $subscribers && $self['subscribers'] = $subscribers;

        return $self;
    }

    /**
     * @param list<Subscriber|SubscriberShape> $subscribers
     */
    public function withSubscribers(array $subscribers): self
    {
        $self = clone $this;
        $self['subscribers'] = $subscribers;

        return $self;
    }
}
