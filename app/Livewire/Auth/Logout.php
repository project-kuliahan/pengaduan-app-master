<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Logout extends Component
{

    public function logout()
    {
        Auth::logout();
        session()->invalidate();
        session()->regenerateToken();
        return $this->redirectIntended(route('login'), navigate: true);
    }

    public function render()
    {
        return view('livewire.auth.logout');
    }
}
