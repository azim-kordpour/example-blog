<?php

namespace App\Livewire\Back\Auth;

use App\Abstracts\Livewire\ParentBackComponent;
use App\Actions\Auth\SaveProfileAction;
use App\DataTransferObjects\ProfileDto;
use App\Livewire\Forms\Back\Auth\ProfileForm;
use Illuminate\Contracts\View\View;

class Profile extends ParentBackComponent
{
    /**
     * The form object.
     */
    public ProfileForm $form;

    /**
     * Bind form's properties.
     */
    public function mount(): void
    {
        $this->form->name = auth()->user()->name;
        $this->form->email = auth()->user()->email;
    }

    /**
     * Handle the request of saving profile's changes.
     */
    public function save(SaveProfileAction $saveProfileAction): void
    {
        $saveProfileAction->run(
            ProfileDto::from($this->form->validate())
        );

        session()->flash('success');
    }

    /**
     * Handle the view of the component,
     */
    public function render(): View
    {
        return view('livewire.back.auth.profile')
            ->layout('components.layouts.back.master');
    }
}
