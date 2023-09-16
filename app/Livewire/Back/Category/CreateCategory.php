<?php

namespace App\Livewire\Back\Category;

use App\Abstracts\Livewire\ParentBackComponent;
use App\Actions\Category\CreateCategoryAction;
use App\Livewire\Forms\Back\Category\CategoryForm;
use Illuminate\Contracts\View\View;

class CreateCategory extends ParentBackComponent
{
    public CategoryForm $form;

    /**
     * Handle the request of creating a new category.
     */
    public function save(CreateCategoryAction $createCategoryAction): void
    {
        $createCategoryAction->run($this->form->name);

        $this->redirect(AllCategories::class, true);
    }

    /**
     * Handle the view of creating a category.
     */
    public function render(): View
    {
        return view('livewire.back.category.create-category')
            ->layout($this->layout);
    }
}
