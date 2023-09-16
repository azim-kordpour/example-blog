<?php

namespace App\Livewire\Front\Contact;

use App\Abstracts\Livewire\ParentComponent;
use App\Actions\Contact\CreateContactAction;
use App\DataTransferObjects\ContactDto;
use App\Livewire\Forms\Front\Contact\CreateContactForm;
use Illuminate\Contracts\View\View;

class CreateContact extends ParentComponent
{
    /**
     * The form of the component
     */
    public CreateContactForm $form;

    /**
     * Handle the request of creating a new contact.
     */
    public function save(CreateContactAction $createContactAction): void
    {
        $createContactAction->run(ContactDto::from($this->form->validate()));

        session()->flash('success');
    }

    /**
     * Handle the view of the component.
     */
    public function render(): View
    {
        return view('livewire.front.contact.create-contact');
    }
}
