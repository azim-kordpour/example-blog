<?php

namespace App\Actions\Post;

use App\Abstracts\Actions\ParentAction;
use App\Models\Post;
use Throwable;

class DeletePostAction extends ParentAction
{
    /**
     * Handle deleting a post.
     *
     * @throws Throwable
     */
    public function run(int $id): ?bool
    {
        return Post::findOrFail($id)->deleteOrFail();
    }
}
