<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('components.layouts.auth')]
class Register extends Component
{
    public $name, $email, $whatsapp, $password, $password_confirmation;

    public function register()
    {
        $this->validate([
            'name'                  => ['required', 'string', 'max:255'],
            'email'                 => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'whatsapp'              => ['required', 'string', 'max:255', 'unique:users'],
            'password'              => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'whatsapp' => $this->whatsapp,
            'password' => bcrypt($this->password),
        ]);

        $this->reset();

        $this->js(<<<JS
            Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: 'Akun berhasil dibuat',
                showConfirmButton: false,
                timer: 3000,
            });
        JS);

        return $this->redirect(route('login'), navigate:true);
    }

    public function render()
    {
        return view('livewire.auth.register');
    }
}