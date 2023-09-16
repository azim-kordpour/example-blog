<?php

use App\Actions\Category\GetAllCategoriesAction;
use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;

it('returns all categories.', function () {
    Category::factory()->createMany(5);

    $categories = resolve(GetAllCategoriesAction::class)->run();
    expect($categories)
        ->toBeInstanceOf(Collection::class)
        ->toHaveCount(5)
        ->and($categories->first())
        ->toBeInstanceOf(Category::class);
});
