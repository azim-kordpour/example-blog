<?php

namespace App\Livewire\Forms\Back\Category;

use Livewire\Attributes\Rule;
use Livewire\Form;

class CategoryForm extends Form
{
    #[Rule('required|max:255')]
    public string $name;
}
