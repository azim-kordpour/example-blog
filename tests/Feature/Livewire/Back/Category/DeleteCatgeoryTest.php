<?php

use App\Actions\Category\DeleteCategoryAction;
use App\Livewire\Back\Category\AllCategories;
use App\Livewire\Back\Category\DeleteCategory;

beforeEach(fn () => asUser());

it('sees "delete" in category.', function () {
    Livewire::test(DeleteCategory::class)
        ->assertSee('Delete');
});

it('deletes a category.', function () {
    DeleteCategoryAction::expectsRunOnceWith(1)->andReturnTrue();

    Livewire::test(DeleteCategory::class)
        ->set('id', 1)
        ->call('delete')
        ->assertRedirect(AllCategories::class);
});
