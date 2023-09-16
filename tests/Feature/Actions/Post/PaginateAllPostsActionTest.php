<?php

use App\Actions\Post\PaginateAllPostsAction;
use App\Models\Post;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

it('paginates the posts.', function () {
    $posts = Post::factory()->createMany(2);

    $result = resolve(PaginateAllPostsAction::class)->run();

    expect($result)
        ->toBeInstanceOf(LengthAwarePaginator::class)
        ->toHaveCount(2)
        ->and($result->pluck('title')->toArray())
        ->toEqualCanonicalizing($posts->pluck('title')->toArray());
});
