<?php

namespace App\Actions\Post;

use App\Abstracts\Actions\ParentAction;
use App\Models\Post;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class PaginatePublishedPostsAction extends ParentAction
{
    /**
     * Handle the operation of getting all published posts.
     */
    public function run(): LengthAwarePaginator
    {
        return Post::with(['writer:id,name', 'categories:name,slug'])
            ->select(['id', 'title', 'introduction', 'writer_id', 'slug', 'published_at'])
            ->published()
            ->latest('published_at')
            ->paginate(config('blog.per_page_posts'));
    }
}
