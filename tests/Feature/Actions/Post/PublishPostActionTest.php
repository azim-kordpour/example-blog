<?php

use App\Actions\Post\PublishPostAction;
use App\Models\Post;

it('publishes a post.', function () {
    $post = Post::factory()->createOne();

    resolve(PublishPostAction::class)->run($post);

    expect($post->refresh()->published_at->toDateTimeString())
        ->toBe(now()->toDateTimeString())
        ->and($post->status->isPublished())
        ->toBeTrue();
});
