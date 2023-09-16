<?php

use App\Actions\Contact\MarkAsAnsweredAction;
use App\Models\Contact;

it('changes the status of the contact to "Answered"', function () {
    $contact = Contact::factory()->createOne();

    $result = resolve(MarkAsAnsweredAction::class)->run($contact);

    expect($result)
        ->toBeTrue()
        ->and($contact->refresh()->status->isAnswered())
        ->toBeTrue();
});
