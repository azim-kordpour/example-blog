<?php

use App\Actions\Category\CreateCategoryAction;
use App\Models\Category;

it('creates a category.', function () {
    $name = fake()->word();

    $category = resolve(CreateCategoryAction::class)->run($name);

    expect($category)
        ->toBeInstanceOf(Category::class)
        ->and($category->refresh()->slug)
        ->toBe(Str::slug($name));
});
