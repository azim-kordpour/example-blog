<?php

use App\Actions\Post\FindPublishedPostBySlugAction;
use App\Models\Post;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Carbon;

it('returns a published post.', function () {
    $post = Post::factory()->published()->createOne();

    $result = resolve(FindPublishedPostBySlugAction::class)->run($post->slug);

    expect($result)
        ->toBeInstanceOf(Post::class)
        ->and($result->only(['body', 'writer_id']))
        ->toEqualCanonicalizing($post->only(['body', 'writer_id']))
        ->and($result->title)
        ->toBe($post->title)
        ->and($result->published_at)
        ->toBeInstanceOf(Carbon::class)
        ->toBeGreaterThan(now()->subMinute());
});

it('throws not found model exception.', function () {
    resolve(FindPublishedPostBySlugAction::class)->run(fake()->slug());
})->throws(ModelNotFoundException::class);
