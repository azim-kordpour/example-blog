<?php

use App\Actions\Post\PaginateAllPostsAction;
use App\Livewire\Back\Post\AllPosts;
use App\Models\Post;
use Illuminate\Pagination\LengthAwarePaginator;

it('return all posts.', function () {
    $posts = Post::factory()->published()->createMany(2);

    PaginateAllPostsAction::expectsRunOnce()
        ->andReturn(new LengthAwarePaginator($posts, 2, 10));

    asUser()
        ->get(route('back.all.posts'))
        ->assertSeeLivewire(AllPosts::class)
        ->assertSee(str($posts->first()->title)->limit(30))
        ->assertSee(str($posts->last()->title)->limit(30))
        ->assertOk();
});
