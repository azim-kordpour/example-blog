<?php

namespace App\Livewire\Back\Post;

use App\Abstracts\Livewire\ParentBackComponent;
use App\Actions\Post\DeletePostAction;
use Illuminate\Contracts\View\View;

class DeletePost extends ParentBackComponent
{
    /**
     * The key of the post.
     */
    public int $id;

    /**
     * Handle the request of deleting a post.
     */
    public function delete(DeletePostAction $deletePostAction): void
    {
        $deletePostAction->run($this->id);

        $this->redirect(AllPosts::class, true);
    }

    /**
     * Handle the view of the component.
     */
    public function render(): View
    {
        return view('livewire.back.post.delete-post');
    }
}
