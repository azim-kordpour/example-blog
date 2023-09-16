<?php

use App\Actions\Post\PublishPostAction;
use App\Livewire\Back\Post\AllPosts;
use App\Livewire\Back\Post\PublishPost;
use App\Models\Post;

beforeEach(fn () => asUser());

it('sees "publish".', function () {
    Livewire::test(PublishPost::class, ['post' => Post::factory()->createOne()->refresh()])
        ->assertSee('Publish')
        ->assertViewIs('livewire.back.post.publish-post');
});

it('publishes a post.', function () {
    $post = Post::factory()->createOne()->refresh();

    PublishPostAction::expectsRunOnce();

    Livewire::test(PublishPost::class, compact('post'))
        ->call('publish')
        ->assertRedirect(AllPosts::class);
});
