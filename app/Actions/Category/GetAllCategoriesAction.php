<?php

namespace App\Actions\Category;

use App\Abstracts\Actions\ParentAction;
use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;

class GetAllCategoriesAction extends ParentAction
{
    /**
     * Handle getting all categories.
     */
    public function run(): Collection
    {
        return Category::all();
    }
}
