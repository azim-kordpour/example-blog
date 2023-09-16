<?php

use App\Livewire\Back\Auth\Login;
use App\Livewire\Back\Post\AllPosts;
use App\Models\User;
use Livewire\Livewire;

it('renders the view of authenticating.')
    ->get('/admin/login')
    ->assertSeeLivewire(Login::class)
    ->assertSee('email')
    ->assertSee('password')
    ->assertSee('Sign In');

it('authenticates a user.', function () {
    $admin = User::factory()->createOne();

    Livewire::test(Login::class)
        ->set('form', ['email' => $admin->email, 'password' => 'password'])
        ->call('authenticate')
        ->assertRedirect(AllPosts::class);
});
