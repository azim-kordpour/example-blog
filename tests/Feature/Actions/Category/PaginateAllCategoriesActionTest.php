<?php

use App\Actions\Category\PaginateAllCategoriesAction;
use App\Models\Category;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

it('returns all categories.', function () {
    config()->set('blog.admin.per_page', 2);
    Category::factory()->createMany(3);

    $categories = resolve(PaginateAllCategoriesAction::class)->run();
    expect($categories)
        ->toBeInstanceOf(LengthAwarePaginator::class)
        ->toHaveCount(2)
        ->and($categories->first())
        ->toBeInstanceOf(Category::class);
});
