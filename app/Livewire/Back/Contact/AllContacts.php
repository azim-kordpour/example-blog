<?php

namespace App\Livewire\Back\Contact;

use App\Abstracts\Livewire\ParentBackComponent;
use App\Actions\Contact\PaginateAllContactsAction;
use Illuminate\Contracts\View\View;
use Livewire\WithPagination;

class AllContacts extends ParentBackComponent
{
    use WithPagination;

    /**
     * Handle the view of the component.
     */
    public function render(PaginateAllContactsAction $paginateAllContactsAction): View
    {
        return view('livewire.back.contact.all-contacts', [
            'contacts' => $paginateAllContactsAction->run(),
        ])->layout($this->layout);
    }
}
