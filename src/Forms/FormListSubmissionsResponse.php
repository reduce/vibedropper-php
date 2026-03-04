<?php

declare(strict_types=1);

namespace Vibedropper\Forms;

use Vibedropper\Core\Attributes\Optional;
use Vibedropper\Core\Concerns\SdkModel;
use Vibedropper\Core\Contracts\BaseModel;
use Vibedropper\Forms\FormListSubmissionsResponse\Submission;
use Vibedropper\Lists\Pagination;

/**
 * @phpstan-import-type PaginationShape from \Vibedropper\Lists\Pagination
 * @phpstan-import-type SubmissionShape from \Vibedropper\Forms\FormListSubmissionsResponse\Submission
 *
 * @phpstan-type FormListSubmissionsResponseShape = array{
 *   pagination?: null|Pagination|PaginationShape,
 *   submissions?: list<Submission|SubmissionShape>|null,
 * }
 */
final class FormListSubmissionsResponse implements BaseModel
{
    /** @use SdkModel<FormListSubmissionsResponseShape> */
    use SdkModel;

    #[Optional]
    public ?Pagination $pagination;

    /** @var list<Submission>|null $submissions */
    #[Optional(list: Submission::class)]
    public ?array $submissions;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Pagination|PaginationShape|null $pagination
     * @param list<Submission|SubmissionShape>|null $submissions
     */
    public static function with(
        Pagination|array|null $pagination = null,
        ?array $submissions = null
    ): self {
        $self = new self;

        null !== $pagination && $self['pagination'] = $pagination;
        null !== $submissions && $self['submissions'] = $submissions;

        return $self;
    }

    /**
     * @param Pagination|PaginationShape $pagination
     */
    public function withPagination(Pagination|array $pagination): self
    {
        $self = clone $this;
        $self['pagination'] = $pagination;

        return $self;
    }

    /**
     * @param list<Submission|SubmissionShape> $submissions
     */
    public function withSubmissions(array $submissions): self
    {
        $self = clone $this;
        $self['submissions'] = $submissions;

        return $self;
    }
}
