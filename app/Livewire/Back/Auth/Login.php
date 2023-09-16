<?php

namespace App\Livewire\Back\Auth;

use App\Abstracts\Livewire\ParentBackComponent;
use App\Livewire\Back\Post\AllPosts;
use App\Livewire\Forms\Back\Auth\LoginForm;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;

class Login extends ParentBackComponent
{
    public LoginForm $form;

    public function __construct()
    {
    }

    /**
     * Handle the request of authenticating.
     */
    public function authenticate(): void
    {
        if (Auth::attempt($this->form->only(['email', 'password']), $this->form->remember_me)) {
            if (request()->hasSession()) {
                request()->session()->regenerate();
            }

            $this->redirect(AllPosts::class);
        }
    }

    /**
     * Handle the view of authenticating.
     */
    public function render(): View
    {
        return view('livewire.back.auth.login')
            ->layout('components.layouts.back.login');
    }
}
