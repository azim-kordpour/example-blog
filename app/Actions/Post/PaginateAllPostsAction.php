<?php

namespace App\Actions\Post;

use App\Abstracts\Actions\ParentAction;
use App\Models\Post;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class PaginateAllPostsAction extends ParentAction
{
    /**
     * Handle the operation of getting all posts.
     */
    public function run(): LengthAwarePaginator
    {
        return Post::with('writer')
            ->latest('id')
            ->paginate(config('blog.admin.per_page'));
    }
}
