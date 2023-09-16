<?php

use App\Actions\Contact\CreateContactAction;
use App\DataTransferObjects\ContactDto;
use App\Models\Contact;

it('creates a new contact.', function () {
    $contactDto = ContactDto::from(Contact::factory()->makeOne());

    $result = resolve(CreateContactAction::class)->run($contactDto);

    expect($result)
        ->toBeInstanceOf(Contact::class)
        ->and($result->exists())
        ->toBeTrue()
        ->and($result->status)
        ->toBe($contactDto->status)
        ->and($result->only($contactDto->except('status')->keysToArray()))
        ->toEqualCanonicalizing($contactDto->except('status')->toArray());
});
