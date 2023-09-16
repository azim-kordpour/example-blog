<?php

namespace App\Actions\Contact;

use App\Abstracts\Actions\ParentAction;
use App\DataTransferObjects\ContactDto;
use App\Models\Contact;

class CreateContactAction extends ParentAction
{
    /**
     * Handle creating a new contact.
     */
    public function run(ContactDto $contactDto): Contact
    {
        return Contact::create($contactDto->toArray());
    }
}
