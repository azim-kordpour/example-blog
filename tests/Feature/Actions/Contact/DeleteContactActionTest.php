<?php

use App\Actions\Contact\DeleteContactAction;
use App\Models\Contact;

it('deletes a contact.', function () {
    $contact = Contact::factory()->createOne();

    $result = resolve(DeleteContactAction::class)->run($contact->id);

    expect($result)
        ->toBeTrue()
        ->and($contact->exists())
        ->toBeFalse();
});
