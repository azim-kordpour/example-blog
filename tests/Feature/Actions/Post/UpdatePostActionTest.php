<?php

use App\Actions\Post\UpdatePostAction;
use App\DataTransferObjects\PostDto;
use App\Models\Category;
use App\Models\Post;

it('updates a post.', function () {
    $data = PostDto::from(Post::factory()->makeOne());
    $data->categories = Category::factory()->createMany(2)->pluck('id')->toArray();

    $post = Post::factory()->createOne()->refresh();

    resolve(UpdatePostAction::class)->run($post, $data);

    expect(Post::where($data->except('categories', 'published_at')->toArray())->first()->id)
        ->toBe($post->id)
        ->and($post->categories->pluck('id')->toArray())
        ->toEqualCanonicalizing($data->categories)
        ->and($post->refresh()->slug)
        ->toBe(Str::slug($data->title));

});
