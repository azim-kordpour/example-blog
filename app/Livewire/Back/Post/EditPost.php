<?php

namespace App\Livewire\Back\Post;

use App\Abstracts\Livewire\ParentBackComponent;
use App\Actions\Category\GetAllCategoriesAction;
use App\Actions\Post\UpdatePostAction;
use App\DataTransferObjects\PostDto;
use App\Livewire\Forms\Back\Post\PostForm;
use App\Models\Post;
use Illuminate\Contracts\View\View;

class EditPost extends ParentBackComponent
{
    /**
     * The form object.
     */
    public PostForm $form;

    /**
     * Route model binding.
     */
    public Post $post;

    /**
     * Bind form's properties.
     */
    public function mount(): void
    {
        $this->form->title = $this->post->title;
        $this->form->description = $this->post->description;
        $this->form->introduction = $this->post->introduction;
        $this->form->body = $this->post->body;
        $this->form->published_at = $this->post->published_at?->toDateTimeString();
        $this->form->categories = $this->post->categories->pluck('id')->toArray();
    }

    /**
     * Handle the request of updating a new post.
     */
    public function update(UpdatePostAction $updatePostAction): void
    {
        $updatePostAction->transactionalRun($this->post, PostDto::from($this->form->validate()));

        $this->redirect(route('front.show.post', $this->post->slug), true);
    }

    /**
     * Handle the view of updating a post.
     */
    public function render(GetAllCategoriesAction $getAllCategoriesAction): View
    {
        return view('livewire.back.post.edit-post')
            ->with('categoryList', $getAllCategoriesAction->run())
            ->layout($this->layout);
    }
}
