<?php

namespace App\Http\Livewire;

use App\Models\KategoriBarang;
use Livewire\Component;

class KategoriBarangPage extends Component
{
    public function render()
    {
        $this->datas = KategoriBarang::latest()->get();
        return view('livewire.kategori-barang-page');
    }

    public $buatPage = false;

    public $nama;

    public function buatData()
    {
        $d = new KategoriBarang();
        $d->nama = $this->nama;
        $d->save();

        $this->buatPage = false;

        // $this->emit('success', ['pesan' => 'Berhasil buat data']);
    }

    public $editPage = false;
    public $ID;

    public function editPageTrue($id)
    {
        $d = KategoriBarang::find($id);
        $this->ID = $id;
        $this->nama = $d->nama;

        $this->editPage = true;

    }

    public function editData()
    {
        $d = KategoriBarang::find($this->ID);
        $d->nama = $this->nama;
        $d->save();

        $this->editPage = false;

        // $this->emit('success', ['pesan' => 'Berhasil edit data']);
    }

    public function hapus($id)
    {
        KategoriBarang::find($id)->delete();

        // $this->emit('success', ['pesan' => 'Berhasil hapus data']);
    }
}
