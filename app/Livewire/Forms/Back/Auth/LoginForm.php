<?php

namespace App\Livewire\Forms\Back\Auth;

use Livewire\Attributes\Rule;
use Livewire\Form;

class LoginForm extends Form
{
    #[Rule('required|email')]
    public string $email = '';

    #[Rule('required|min:6')]
    public string $password = '';

    #[Rule('required|boolean')]
    public bool $remember_me = false;
}
