<?php

use App\Actions\Post\FindPublishedPostBySlugAction;
use App\Livewire\Front\Post\ShowPost;
use App\Models\Post;

it('renders showing a post', function () {
    $post = Post::factory()->published()->createOne();

    FindPublishedPostBySlugAction::expectsRunOnceWith($post->slug)->andReturn($post);

    $this->get(route('front.show.post', $post->slug))
        ->assertSeeLivewire(ShowPost::class)
        ->assertSeeText($post->title)
        ->assertSeeText($post->body)
        ->assertSee($post->writer->name)
        ->assertOk();
});

it('throw the exception of not found', function () {
    $post = Post::factory()->draft()->createOne();

    $this->get(route('front.show.post', $post->slug))
        ->assertNotFound();
});
