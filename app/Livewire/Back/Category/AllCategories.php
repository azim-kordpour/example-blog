<?php

namespace App\Livewire\Back\Category;

use App\Abstracts\Livewire\ParentBackComponent;
use App\Actions\Category\PaginateAllCategoriesAction;
use Illuminate\Contracts\View\View;
use Livewire\WithPagination;

class AllCategories extends ParentBackComponent
{
    use WithPagination;

    /**
     * Handle the view of all categories.
     */
    public function render(PaginateAllCategoriesAction $paginateAllCategoriesAction): View
    {
        return view('livewire.back.category.all-categories', [
            'categories' => $paginateAllCategoriesAction->run(),
        ])->layout($this->layout);
    }
}
