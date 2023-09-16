<?php

namespace App\Actions\Post;

use App\Abstracts\Actions\ParentAction;
use App\DataTransferObjects\PostDto;
use App\Models\Post;

class UpdatePostAction extends ParentAction
{
    /**
     * Handle creating a post.
     */
    public function run(Post $post, PostDto $data): void
    {
        if (! $post->isPublished()) {
            $post->slug = null;
        }

        $post->update($data->toArray());

        if (is_array($data->categories)) {
            $post->categories()->sync($data->categories);
        }
    }
}
