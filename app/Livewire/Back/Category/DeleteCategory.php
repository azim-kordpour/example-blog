<?php

namespace App\Livewire\Back\Category;

use App\Abstracts\Livewire\ParentBackComponent;
use App\Actions\Category\DeleteCategoryAction;
use Illuminate\Contracts\View\View;

class DeleteCategory extends ParentBackComponent
{
    /**
     * The key of the post.
     */
    public int $id;

    /**
     * Handle the request of deleting a category.
     */
    public function delete(DeleteCategoryAction $deleteCategoryAction): void
    {
        $deleteCategoryAction->run($this->id);

        $this->redirect(AllCategories::class, true);
    }

    /**
     * Handle the view of the component.
     */
    public function render(): View
    {
        return view('livewire.back.category.delete-category');
    }
}
