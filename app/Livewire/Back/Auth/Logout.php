<?php

namespace App\Livewire\Back\Auth;

use App\Abstracts\Livewire\ParentBackComponent;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Logout extends ParentBackComponent
{
    /**
     * Handle the request of logging out.
     */
    public function logout(Request $request): void
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        $this->redirect('/');
    }

    /**
     * View the logout.
     */
    public function render(): View
    {
        return view('livewire.back.auth.logout');
    }
}
