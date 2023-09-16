<?php

namespace App\Abstracts\Livewire;

abstract class ParentBackComponent extends ParentComponent
{
    /**
     * The layout of admin pages.
     */
    protected string $layout = 'components.layouts.back.master';

    /**
     * Create a new instance of the class.
     */
    public function __construct()
    {
        $this->authorize('admin');
    }
}
