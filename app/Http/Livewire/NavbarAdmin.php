<?php

namespace App\Http\Livewire;

use Livewire\Component;

class NavbarAdmin extends Component
{
    public function render()
    {
        return view('livewire.navbar-admin');
    }

    public function logout()
    {
        auth()->logout();
        redirect('login');
    }
}
