<?php

namespace App\Actions\Category;

use App\Abstracts\Actions\ParentAction;
use App\Models\Category;
use Throwable;

class DeleteCategoryAction extends ParentAction
{
    /**
     * Handle deleting a category.
     *
     * @throws Throwable
     */
    public function run(int $id): ?bool
    {
        return Category::findOrFail($id)->deleteOrFail();
    }
}
