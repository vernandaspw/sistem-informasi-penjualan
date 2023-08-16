<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class DaftarPage extends Component
{
    public $nama;
    public $username;
    public $password;

    public function render()
    {
        return view('livewire.daftar-page');
    }

    public function daftar()
    {
        $user = User::create([
            'nama' => $this->nama,
            'username' => $this->username,
            'password' => $this->password,
            'role' => 'pelanggan',
        ]);

        auth()->login($user, true);

        redirect('/');
    }
}
