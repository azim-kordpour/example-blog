<?php

use App\Actions\Post\DeletePostAction;
use App\Livewire\Back\Post\AllPosts;
use App\Livewire\Back\Post\DeletePost;

beforeEach(fn () => asUser());

it('sees "delete".', function () {
    Livewire::test(DeletePost::class)
        ->assertSee('Delete')
        ->assertViewIs('livewire.back.post.delete-post');
});

it('deletes a post.', function () {
    DeletePostAction::expectsRunOnceWith(1)->andReturnTrue();

    Livewire::test(DeletePost::class, ['id' => 1])
        ->call('delete')
        ->assertRedirect(AllPosts::class);
});
