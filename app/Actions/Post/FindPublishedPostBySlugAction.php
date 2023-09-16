<?php

namespace App\Actions\Post;

use App\Abstracts\Actions\ParentAction;
use App\Models\Post;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class FindPublishedPostBySlugAction extends ParentAction
{
    /**
     * Handle the operation of finding a post.
     *
     * @throws ModelNotFoundException
     */
    public function run(string $slug): Post
    {
        return Post::with(['writer:id,name', 'categories:name,slug'])
            ->when(! auth()->check(), fn ($q) => $q->published())
            ->select(['id', 'title', 'description', 'body', 'writer_id', 'published_at'])
            ->whereSlug($slug)
            ->firstOrFail();
    }
}
