<?php

declare(strict_types=1);

namespace Vibedropper\KnowledgeBases;

use Vibedropper\Core\Attributes\Optional;
use Vibedropper\Core\Concerns\SdkModel;
use Vibedropper\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type KnowledgeBaseShape from \Vibedropper\KnowledgeBases\KnowledgeBase
 *
 * @phpstan-type KnowledgeBaseListResponseShape = array{
 *   knowledgeBases?: list<KnowledgeBase|KnowledgeBaseShape>|null
 * }
 */
final class KnowledgeBaseListResponse implements BaseModel
{
    /** @use SdkModel<KnowledgeBaseListResponseShape> */
    use SdkModel;

    /** @var list<KnowledgeBase>|null $knowledgeBases */
    #[Optional(list: KnowledgeBase::class)]
    public ?array $knowledgeBases;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<KnowledgeBase|KnowledgeBaseShape>|null $knowledgeBases
     */
    public static function with(?array $knowledgeBases = null): self
    {
        $self = new self;

        null !== $knowledgeBases && $self['knowledgeBases'] = $knowledgeBases;

        return $self;
    }

    /**
     * @param list<KnowledgeBase|KnowledgeBaseShape> $knowledgeBases
     */
    public function withKnowledgeBases(array $knowledgeBases): self
    {
        $self = clone $this;
        $self['knowledgeBases'] = $knowledgeBases;

        return $self;
    }
}
