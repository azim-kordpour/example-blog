<?php

use App\Livewire\Back\Auth\Profile;

beforeEach(fn () => asUser());

it('renders the view of profile.')
    ->get('/admin/profile')
    ->assertSeeLivewire(Profile::class)
    ->assertSee('name')
    ->assertSee('email')
    ->assertSee('Current Password')
    ->assertSee('New Password');
