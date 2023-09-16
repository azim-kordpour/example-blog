<?php

use App\Actions\Post\UpdatePostAction;
use App\Livewire\Back\Post\EditPost;
use App\Models\Category;
use App\Models\Post;

beforeEach(fn () => asUser());

it('loads editing post\'s page', function () {
    $post = Post::factory()->published()->hasCategories(2)->createOne();

    $this->get(route('back.edit.post', $post))
        ->assertSeeLivewire(EditPost::class)
        ->assertSee($post->title)
        ->assertSee($post->description)
        ->assertSee($post->body)
        ->assertSee($post->published_at)
        ->assertSee($post->categories->pluck('id'));
});

it('updates a post.', function () {
    $post = Post::factory()->published()->hasCategories(2)->createOne();

    $data = Post::factory()->makeOne()->makeHidden('writer_id')->toArray();
    $data['categories'] = Category::factory()->createMany(2)->pluck('id')->toArray();
    $data['published_at'] = now()->toDateTimeString();

    UpdatePostAction::expectsTransactionalRunOnce();

    Livewire::test(EditPost::class, ['post' => $post])
        ->set('form', $data)
        ->call('update')
        ->assertRedirect(route('front.show.post', $slug = $post->refresh()->slug));

});
