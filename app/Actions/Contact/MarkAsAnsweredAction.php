<?php

namespace App\Actions\Contact;

use App\Abstracts\Actions\ParentAction;
use App\Enums\ContactStatus;
use App\Models\Contact;

class MarkAsAnsweredAction extends ParentAction
{
    /**
     * Change the status of the given contact as answered.
     */
    public function run(Contact $contact): bool
    {
        return $contact->update(['status' => ContactStatus::Answered]);
    }
}
