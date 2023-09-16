<?php

namespace App\DataTransferObjects;

use App\Abstracts\DataTransferObjects\ParentDto;
use App\Enums\PostStatus;
use Carbon\Carbon;
use Spatie\LaravelData\Optional;

class PostDto extends ParentDto
{
    /**
     * Create a new instance of the class.
     */
    public function __construct(
        public ?int $writer_id,
        public string $title,
        public string $description,
        public ?string $introduction,
        public string $body,
        public ?Carbon $published_at,
        /**
         * @var array<int> $categories
         */
        public array|Optional $categories,
        public PostStatus $status = PostStatus::Draft,
    ) {
        if (! $this->writer_id) {
            $this->writer_id = auth()->user()?->id;
        }
    }
}
