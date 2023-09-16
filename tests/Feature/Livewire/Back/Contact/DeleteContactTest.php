<?php

use App\Actions\Contact\DeleteContactAction;
use App\Livewire\Back\Contact\AllContacts;
use App\Livewire\Back\Contact\DeleteContact;

beforeEach(fn () => asUser());

it('sees "delete" in contact.', function () {
    Livewire::test(DeleteContact::class)
        ->assertSee('Delete');
});

it('deletes a contact.', function () {
    DeleteContactAction::expectsRunOnceWith(1)->andReturnTrue();

    Livewire::test(DeleteContact::class)
        ->set('id', 1)
        ->call('delete')
        ->assertRedirect(AllContacts::class);
});
