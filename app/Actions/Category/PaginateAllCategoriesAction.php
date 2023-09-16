<?php

namespace App\Actions\Category;

use App\Abstracts\Actions\ParentAction;
use App\Models\Category;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class PaginateAllCategoriesAction extends ParentAction
{
    /**
     * Handle the operation of getting all categories.
     */
    public function run(): LengthAwarePaginator
    {
        return Category::latest('id')
            ->paginate(config('blog.admin.per_page'));
    }
}
