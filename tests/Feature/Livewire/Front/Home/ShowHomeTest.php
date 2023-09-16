<?php

use App\Actions\Post\PaginatePublishedPostsAction;
use App\Livewire\Front\Home\ShowHome;
use App\Models\Post;
use Illuminate\Pagination\LengthAwarePaginator;

it('renders home page', function () {
    $publishedPost = Post::factory()->published()->createOne();
    $archivePost = Post::factory()->archive()->createOne();

    PaginatePublishedPostsAction::expectsRunOnce()
        ->andReturn(new LengthAwarePaginator([$publishedPost], 1, 5));

    $this->get(route('home'))
        ->assertSeeLivewire(ShowHome::class)
        ->assertStatus(200)
        ->assertSee($publishedPost->title)
        ->assertDontSee($archivePost->title);
});
