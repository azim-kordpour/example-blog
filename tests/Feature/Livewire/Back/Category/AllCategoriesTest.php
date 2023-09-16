<?php

use App\Actions\Category\PaginateAllCategoriesAction;
use App\Livewire\Back\Category\AllCategories;
use App\Models\Category;
use Illuminate\Pagination\LengthAwarePaginator;

it('return all categories.', function () {
    $categories = Category::factory()->createMany(2);

    PaginateAllCategoriesAction::expectsRunOnce()
        ->andReturn(new LengthAwarePaginator($categories, 2, 10));

    asUser()
        ->get(route('back.all.categories'))
        ->assertSeeLivewire(AllCategories::class)
        ->assertSee($categories->first()->name)
        ->assertSee($categories->last()->name)
        ->assertOk();
});
