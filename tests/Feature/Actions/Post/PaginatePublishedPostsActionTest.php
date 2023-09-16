<?php

use App\Actions\Post\PaginatePublishedPostsAction;
use App\Models\Post;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

it('returns the latest published posts.', function () {
    $posts = Post::factory()->published()->createMany(2);
    Post::factory()->published(now()->addDay())->createOne();

    $result = resolve(PaginatePublishedPostsAction::class)->run();

    expect($result)
        ->toBeInstanceOf(LengthAwarePaginator::class)
        ->toHaveCount(2)
        ->and($result->pluck('title')->toArray())
        ->toEqualCanonicalizing($posts->pluck('title')->toArray());
});
