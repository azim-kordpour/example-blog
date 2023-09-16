<?php

use App\Actions\Category\CreateCategoryAction;
use App\Livewire\Back\Category\AllCategories;
use App\Livewire\Back\Category\CreateCategory;
use App\Models\Category;

beforeEach(fn () => asUser());

it('loads creating category\'s page', function () {
    $this->get(route('back.create.category'))
        ->assertSeeLivewire(CreateCategory::class);

    Livewire::test(CreateCategory::class)
        ->assertViewIs('livewire.back.category.create-category');
});

it('saves a new category.', function () {
    $name = fake()->word();

    CreateCategoryAction::expectsRunOnceWith($name)->andReturn(Category::make());

    Livewire::test(CreateCategory::class)
        ->set('form', compact('name'))
        ->call('save')
        ->assertRedirect(AllCategories::class);
});
