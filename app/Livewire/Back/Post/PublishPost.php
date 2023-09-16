<?php

namespace App\Livewire\Back\Post;

use App\Abstracts\Livewire\ParentBackComponent;
use App\Actions\Post\PublishPostAction;
use App\Models\Post;
use Illuminate\Contracts\View\View;

class PublishPost extends ParentBackComponent
{
    /**
     * The key of the post.
     */
    public Post $post;

    /**
     * handle the request of publishing a post.
     */
    public function publish(PublishPostAction $publishPostAction): void
    {
        $publishPostAction->run($this->post);

        $this->redirect(AllPosts::class, true);
    }

    /**
     * Handle the view of the component.
     */
    public function render(): View
    {
        return view('livewire.back.post.publish-post');
    }
}
