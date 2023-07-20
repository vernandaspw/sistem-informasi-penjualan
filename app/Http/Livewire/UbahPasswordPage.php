<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class UbahPasswordPage extends Component
{
    public function render()
    {
        return view('livewire.ubah-password-page');
    }

    public $password_lama, $password_baru;
    public function ubahData()
    {
        $user = User::find(auth()->user()->id);
        if (Hash::check($this->password_lama, $user->password)) {
            $user->password = Hash::make($this->password_baru);
            $user->save();
            session()->flash('alertSuccess', 'Berhasil ubah password');
        }else{
            session()->flash('alert', 'password lama salah');
        }
    }
}
