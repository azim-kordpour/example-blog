<?php

namespace App\Livewire\Forms\Back\Post;

use Livewire\Attributes\Rule;
use Livewire\Form;

class PostForm extends Form
{
    #[Rule('required|string|max:240')]
    public string $title;

    #[Rule('required|string|max:240')]
    public string $description;

    #[Rule('string|max:240')]
    public string $introduction;

    #[Rule('required|string')]
    public string $body;

    #[Rule('nullable|date_format:Y-m-d H:i:s')]
    public ?string $published_at;

    /**
     * @var array <int>
     */
    #[Rule('required')]
    public array $categories = [];
}
