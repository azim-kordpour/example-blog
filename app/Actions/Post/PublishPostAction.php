<?php

namespace App\Actions\Post;

use App\Abstracts\Actions\ParentAction;
use App\Enums\PostStatus;
use App\Models\Post;

class PublishPostAction extends ParentAction
{
    /**
     * Handle publishing a post.
     */
    public function run(Post $post): void
    {
        $post->status = PostStatus::Published;

        if (! $post->published_at) {
            $post->published_at = now();
        }

        $post->save();
    }
}
