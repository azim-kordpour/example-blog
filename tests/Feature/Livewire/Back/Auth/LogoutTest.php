<?php

use App\Livewire\Back\Auth\Logout;
use Livewire\Livewire;

it('render the text of logout.', function () {
    asUser();
    Livewire::test(Logout::class)
        ->assertSee('logout');
});
