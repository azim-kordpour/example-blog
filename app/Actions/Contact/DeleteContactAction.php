<?php

namespace App\Actions\Contact;

use App\Abstracts\Actions\ParentAction;
use App\Models\Contact;

class DeleteContactAction extends ParentAction
{
    /**
     * Handle deleting a contact by the given id.
     */
    public function run(int $id): bool
    {
        return Contact::whereKey($id)->delete();
    }
}
