<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class DataAkunPage extends Component
{
    public function render()
    {
        $this->datas = User::where('role', '!=', 'pelanggan')->latest()->get();
        return view('livewire.data-akun-page');
    }

    public $buatPage = false;

    public $nama, $username, $password, $role, $isaktif;

    public function buatData()
    {
        $d = new User();
        $d->nama = $this->nama;
        $d->username = $this->username;
        $d->password = Hash::make($this->password);
        $d->role = $this->role;
        $d->save();

        $this->buatPage = false;

        // $this->emit('success', ['pesan' => 'Berhasil buat data']);
    }

    public $editPage = false;
    public $ID;

    public function editPageTrue($id)
    {
        $d = User::find($id);
        $this->ID = $id;
        $this->nama = $d->nama;
        $this->username = $d->username;
        $this->role = $d->role;
        $this->isaktif = $d->isaktif;
        $this->password = null;

        $this->editPage = true;

    }

    public function editData()
    {
        $d = User::find($this->ID);
        $d->nama = $this->nama;
        $d->username = $this->username;
        if ($this->password) {
            $d->password = Hash::make($this->password);
        }
        $d->role = $this->role;
        $d->isaktif = $this->isaktif;
        $d->save();

        $this->editPage = false;

        // $this->emit('success', ['pesan' => 'Berhasil edit data']);
    }

    public function hapus($id)
    {
        User::find($id)->delete();

        // $this->emit('success', ['pesan' => 'Berhasil hapus data']);
    }
}
