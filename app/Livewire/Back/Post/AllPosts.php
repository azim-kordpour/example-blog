<?php

namespace App\Livewire\Back\Post;

use App\Abstracts\Livewire\ParentBackComponent;
use App\Actions\Post\PaginateAllPostsAction;
use Illuminate\Contracts\View\View;
use Livewire\WithPagination;

class AllPosts extends ParentBackComponent
{
    use WithPagination;

    /**
     * Handle the request of getting all posts.
     */
    public function render(PaginateAllPostsAction $paginateAllPostsAction): View
    {
        return view('livewire.back.post.index', [
            'posts' => $paginateAllPostsAction->run(),
        ])->layout($this->layout);
    }
}
