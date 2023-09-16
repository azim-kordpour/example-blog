<?php

namespace App\Actions\Post;

use App\Abstracts\Actions\ParentAction;
use App\DataTransferObjects\PostDto;
use App\Models\Post;

class CreatePostAction extends ParentAction
{
    /**
     * Handle creating a post.
     */
    public function run(PostDto $data): Post
    {
        $post = Post::create($data->toArray());

        $post->categories()->attach($data->categories);

        return $post;
    }
}
