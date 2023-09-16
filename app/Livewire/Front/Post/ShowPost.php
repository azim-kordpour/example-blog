<?php

namespace App\Livewire\Front\Post;

use App\Abstracts\Livewire\ParentComponent;
use App\Actions\Post\FindPublishedPostBySlugAction;
use Illuminate\Contracts\View\View;

class ShowPost extends ParentComponent
{
    /**
     * Handle the request of showing a post.
     */
    public function render(FindPublishedPostBySlugAction $findPublishedPostBySlugAction): View
    {
        $post = $findPublishedPostBySlugAction->run(request()->slug);

        return view('livewire.front.post.show', compact('post'));
    }
}
