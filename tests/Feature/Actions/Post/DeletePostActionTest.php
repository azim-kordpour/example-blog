<?php

use App\Actions\Post\DeletePostAction;
use App\Models\Post;

it('deletes a post.', function () {
    $post = Post::factory()->createOne();

    expect(resolve(DeletePostAction::class)->run($post->id))
        ->toBeTrue()
        ->and($post->exists())
        ->toBeFalse();
});
