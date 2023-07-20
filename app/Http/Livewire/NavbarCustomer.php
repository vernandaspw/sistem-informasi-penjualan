<?php

namespace App\Http\Livewire;

use Livewire\Component;

class NavbarCustomer extends Component
{
    public function render()
    {
        return view('livewire.navbar-customer');
    }

    public function logout()
    {
        auth()->logout();
        redirect('login');
    }
}
