<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class LoginPage extends Component
{
    public function render()
    {
        return view('livewire.login-page');
    }

    public $username, $password;

    public function login()
    {
        $this->validate([
            'username' => 'alpha_dash',
        ]);

        $user = User::where('username', $this->username)->first();
        if ($user) {
            if (Hash::check($this->password, $user->password)) {
                auth()->login($user, true);
                if ($user->role == 'pelanggan') {
                    redirect('/');
                } else {
                    redirect('dashboard');
                }
            } else {
                $this->emit('error', ['pesan' => 'Password salah']);
            }
        } else {
            $this->emit('error', ['pesan' => 'Akun tidak ditemukan']);
        }
    }
}
