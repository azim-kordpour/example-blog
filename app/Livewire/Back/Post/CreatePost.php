<?php

namespace App\Livewire\Back\Post;

use App\Abstracts\Livewire\ParentBackComponent;
use App\Actions\Category\GetAllCategoriesAction;
use App\Actions\Post\CreatePostAction;
use App\DataTransferObjects\PostDto;
use App\Livewire\Forms\Back\Post\PostForm;
use Illuminate\Contracts\View\View;

class CreatePost extends ParentBackComponent
{
    public PostForm $form;

    /**
     * Handle the request of creating a new post.
     */
    public function save(CreatePostAction $createPostAction): void
    {
        $post = $createPostAction->transactionalRun(PostDto::from($this->form->validate()));

        $this->redirect(route('front.show.post', $post->slug), true);
    }

    /**
     * Handle the view of creating a new post.
     */
    public function render(GetAllCategoriesAction $allCategoriesAction): View
    {
        return view('livewire.back.post.create-post')
            ->with('categoryList', $allCategoriesAction->run())
            ->layout($this->layout);
    }
}
