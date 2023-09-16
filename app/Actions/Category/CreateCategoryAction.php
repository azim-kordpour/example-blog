<?php

namespace App\Actions\Category;

use App\Abstracts\Actions\ParentAction;
use App\Models\Category;

class CreateCategoryAction extends ParentAction
{
    /**
     * Handle deleting a category.
     */
    public function run(string $name): Category
    {
        return Category::create(compact('name'));
    }
}
