<?php

use App\Actions\Post\CreatePostAction;
use App\Livewire\Back\Post\CreatePost;
use App\Models\Category;
use App\Models\Post;

beforeEach(fn () => asUser());

it('loads creating post\'s page', function () {
    $this->get(route('back.create.post'))
        ->assertSeeLivewire(CreatePost::class);

    $categories = Category::factory()->createMany(2);

    Livewire::test(CreatePost::class)
        ->assertViewHas('categoryList', fn ($viewCategories) => $viewCategories->count() === $categories->count())
        ->assertViewIs('livewire.back.post.create-post');
});

it('saves a new post.', function () {
    $data = Post::factory()->makeOne()->makeHidden('writer_id')->toArray();
    $data['categories'] = Category::factory()->createMany(2)->pluck('id')->toArray();
    $data['published_at'] = now()->toDateTimeString();

    CreatePostAction::expectsTransactionalRunOnce()
        ->andReturn(Post::make(['slug' => Str::slug($data['title'])]));

    Livewire::test(CreatePost::class)
        ->set('form', $data)
        ->call('save')
        ->assertRedirect(route('front.show.post', $slug = Str::slug($data['title'])));
});
