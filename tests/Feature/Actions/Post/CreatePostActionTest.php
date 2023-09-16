<?php

use App\Actions\Post\CreatePostAction;
use App\DataTransferObjects\PostDto;
use App\Models\Category;
use App\Models\Post;

it('handles creating a new post.', function () {
    $data = PostDto::from(Post::factory()->makeOne());
    $data->categories = Category::factory()->createMany(2)->pluck('id')->toArray();

    $result = resolve(CreatePostAction::class)->run($data);

    expect($result)
        ->toBeInstanceOf(Post::class)
        ->and($result->exists)
        ->toBeTrue()
        ->and($data->only('title', 'description', 'body')->toArray())
        ->toEqualCanonicalizing($result->only(['title', 'description', 'body']))
        ->and($result->categories->pluck('id')->toArray())
        ->toEqualCanonicalizing($data->categories)
        ->and($result->slug)
        ->toBe(Str::slug($data->title));
});
