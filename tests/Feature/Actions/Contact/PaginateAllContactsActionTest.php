<?php

use App\Actions\Category\PaginateAllCategoriesAction;
use App\Models\Category;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

it('return all categories.', function () {
    $categories = Category::factory()->createMany(2);

    $result = resolve(PaginateAllCategoriesAction::class)->run();

    expect($result)
        ->toBeInstanceOf(LengthAwarePaginator::class)
        ->and($result->pluck('id')->toArray())
        ->toEqualCanonicalizing($categories->pluck('id')->toArray());
});
