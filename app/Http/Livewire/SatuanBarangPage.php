<?php

namespace App\Http\Livewire;

use App\Models\SatuanBarang;
use Livewire\Component;

class SatuanBarangPage extends Component
{
    public function render()
    {
        $this->datas = SatuanBarang::latest()->get();
        return view('livewire.satuan-barang-page');
    }

    public $buatPage = false;

    public $nama;

    public function buatData()
    {
        $d = new SatuanBarang();
        $d->nama = $this->nama;
        $d->save();

        $this->buatPage = false;

        // $this->emit('success', ['pesan' => 'Berhasil buat data']);
    }

    public $editPage = false;
    public $ID;

    public function editPageTrue($id)
    {
        $d = SatuanBarang::find($id);
        $this->ID = $id;
        $this->nama = $d->nama;
      
        $this->editPage = true;

    }

    public function editData()
    {
        $d = SatuanBarang::find($this->ID);
        $d->nama = $this->nama;
        $d->save();

        $this->editPage = false;

        // $this->emit('success', ['pesan' => 'Berhasil edit data']);
    }

    public function hapus($id)
    {
        SatuanBarang::find($id)->delete();

        // $this->emit('success', ['pesan' => 'Berhasil hapus data']);
    }

}
