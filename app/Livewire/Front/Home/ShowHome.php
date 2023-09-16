<?php

namespace App\Livewire\Front\Home;

use App\Abstracts\Livewire\ParentComponent;
use App\Actions\Post\PaginatePublishedPostsAction;
use Illuminate\Contracts\View\View;
use Livewire\WithPagination;

class ShowHome extends ParentComponent
{
    use WithPagination;

    /**
     * Handle the requests of getting all published posts.
     */
    public function render(PaginatePublishedPostsAction $getPublishedPostsAction): View
    {
        $posts = $getPublishedPostsAction->run();

        return view('livewire.front.home.show', compact('posts'));
    }
}
