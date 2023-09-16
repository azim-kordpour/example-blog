<?php

namespace App\Livewire\Forms\Back\Auth;

use Livewire\Attributes\Rule;
use Livewire\Form;

class ProfileForm extends Form
{
    #[Rule('required|string|max:255')]
    public string $name = '';

    #[Rule('required|email|max:255')]
    public string $email = '';

    #[Rule('required|min:6')]
    public string $password = '';

    #[Rule('min:6')]
    public ?string $new_password = null;
}
