<?php

use App\Actions\Contact\PaginateAllContactsAction;
use App\Livewire\Back\Contact\AllContacts;
use App\Models\Contact;
use Illuminate\Pagination\LengthAwarePaginator;

it('return all contacts.', function () {
    $contacts = Contact::factory()->createMany(2)->each->refresh();

    PaginateAllContactsAction::expectsRunOnce()
        ->andReturn(new LengthAwarePaginator($contacts, 2, 10));

    asUser()
        ->get(route('back.all.contacts'))
        ->assertSeeLivewire(AllContacts::class)
        ->assertSee($contacts->first()->subject)
        ->assertSee($contacts->last()->subject);
});
