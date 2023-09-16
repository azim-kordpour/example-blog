<?php

namespace App\Livewire\Back\Contact;

use App\Abstracts\Livewire\ParentBackComponent;
use App\Actions\Contact\MarkAsAnsweredAction;
use App\Models\Contact;
use Illuminate\Contracts\View\View;

class MarkAsAnswered extends ParentBackComponent
{
    /**
     * The model of Contact.
     */
    public Contact $contact;

    /**
     * Handle the request of marking a contact as answered.
     */
    public function mark(MarkAsAnsweredAction $markAsAnsweredAction): void
    {
        $markAsAnsweredAction->run($this->contact);

        $this->redirect(AllContacts::class, true);
    }

    /**
     * Handle the view of the component.
     */
    public function render(): View
    {
        return view('livewire.back.contact.mark-as-answered');
    }
}
