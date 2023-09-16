<?php

use App\Actions\Contact\CreateContactAction;
use App\DataTransferObjects\ContactDto;
use App\Livewire\Front\Contact\CreateContact;
use App\Models\Contact;

it('shows the view.', function () {
    Livewire::test(CreateContact::class)
        ->assertSee('subject')
        ->assertSee('name')
        ->assertSee('email')
        ->assertSee('message')
        ->assertViewIs('livewire.front.contact.create-contact');
});

it('saves a new contact.', function () {
    $data = Contact::factory()->makeOne()->toArray();

    CreateContactAction::expectsRunOnceWith(ContactDto::from($data))
        ->andReturn(Contact::make());

    Livewire::test(CreateContact::class)
        ->set('form', $data)
        ->call('save');
});
