<?php

namespace App\Livewire\Back\Contact;

use App\Abstracts\Livewire\ParentBackComponent;
use App\Actions\Contact\DeleteContactAction;
use Illuminate\Contracts\View\View;

class DeleteContact extends ParentBackComponent
{
    /**
     * The id of the contact.
     */
    public int $id;

    /**
     * Handle the request of deleting a contact.
     */
    public function delete(DeleteContactAction $deleteContactAction): void
    {
        $deleteContactAction->run($this->id);

        $this->redirect(AllContacts::class, true);
    }

    /**
     * Handle the view of the component.
     */
    public function render(): View
    {
        return view('livewire.back.contact.delete-contact');
    }
}
