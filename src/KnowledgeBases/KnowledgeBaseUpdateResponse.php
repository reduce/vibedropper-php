<?php

declare(strict_types=1);

namespace Vibedropper\KnowledgeBases;

use Vibedropper\Core\Attributes\Optional;
use Vibedropper\Core\Concerns\SdkModel;
use Vibedropper\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type KnowledgeBaseShape from \Vibedropper\KnowledgeBases\KnowledgeBase
 *
 * @phpstan-type KnowledgeBaseUpdateResponseShape = array{
 *   knowledgeBase?: null|KnowledgeBase|KnowledgeBaseShape
 * }
 */
final class KnowledgeBaseUpdateResponse implements BaseModel
{
    /** @use SdkModel<KnowledgeBaseUpdateResponseShape> */
    use SdkModel;

    #[Optional]
    public ?KnowledgeBase $knowledgeBase;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param KnowledgeBase|KnowledgeBaseShape|null $knowledgeBase
     */
    public static function with(KnowledgeBase|array|null $knowledgeBase = null): self
    {
        $self = new self;

        null !== $knowledgeBase && $self['knowledgeBase'] = $knowledgeBase;

        return $self;
    }

    /**
     * @param KnowledgeBase|KnowledgeBaseShape $knowledgeBase
     */
    public function withKnowledgeBase(KnowledgeBase|array $knowledgeBase): self
    {
        $self = clone $this;
        $self['knowledgeBase'] = $knowledgeBase;

        return $self;
    }
}
