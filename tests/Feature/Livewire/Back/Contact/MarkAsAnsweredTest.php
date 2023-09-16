<?php

use App\Enums\ContactStatus;
use App\Livewire\Back\Contact\AllContacts;
use App\Livewire\Back\Contact\MarkAsAnswered;
use App\Models\Contact;

beforeEach(fn () => asUser());

it('sees "Mark as Answered" in contact.', function () {
    Livewire::test(MarkAsAnswered::class, ['contact' => Contact::factory()->createOne()->refresh()])
        ->assertSee('Mark as Answered');

    Livewire::test(MarkAsAnswered::class, ['contact' => Contact::factory()
        ->set('status', ContactStatus::Answered)
        ->createOne()
        ->refresh(),
    ])
        ->assertSee(ContactStatus::Answered->label());
});

it('marks a contact as answered.', function () {
    $contact = Contact::factory()->createOne()->refresh();

    Livewire::test(MarkAsAnswered::class, compact('contact'))
        ->call('mark')
        ->assertRedirect(AllContacts::class);

    expect($contact->refresh()->status->isAnswered())
        ->toBeTrue();
});
