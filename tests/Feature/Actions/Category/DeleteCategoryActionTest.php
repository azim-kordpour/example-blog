<?php

use App\Actions\Category\DeleteCategoryAction;
use App\Models\Category;

it('deletes a category.', function () {
    $category = Category::factory()->createOne();

    resolve(DeleteCategoryAction::class)->run($category->id);

    expect($category->exists())->toBeFalse();
});
