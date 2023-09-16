<?php

namespace App\Livewire\Forms\Front\Contact;

use Livewire\Attributes\Rule;
use Livewire\Form;

class CreateContactForm extends Form
{
    #[Rule('required|string|max:255')]
    public string $subject;

    #[Rule('required|string|max:255')]
    public string $name;

    #[Rule('required|email|max:255')]
    public string $email;

    #[Rule('required|string')]
    public string $message;
}
