<?php

namespace App\Http\Livewire;

use App\Models\DataBank;
use Livewire\Component;

class DataBankPage extends Component
{
    public function render()
    {
        $this->datas = DataBank::latest()->get();
        return view('livewire.data-bank-page');
    }

    public $buatPage = false;

    public $nama_bank, $norek, $an;

    public function buatData()
    {
        $d = new DataBank();
        $d->nama_bank = $this->nama_bank;
        $d->norek = $this->norek;
        $d->an = $this->an;
        $d->save();

        $this->buatPage = false;

        // $this->emit('success', ['pesan' => 'Berhasil buat data']);
    }

    public $editPage = false;
    public $ID;

    public function editPageTrue($id)
    {
        $d = DataBank::find($id);
        $this->ID = $id;
        $this->nama_bank = $d->nama_bank;
        $this->norek = $d->norek;
        $this->an = $d->an;

        $this->editPage = true;

    }

    public function editData()
    {
        $d = DataBank::find($this->ID);
        $d->nama_bank = $this->nama_bank;
        $d->norek = $this->norek;
        $d->an = $this->an;
        $d->save();

        $this->editPage = false;

        // $this->emit('success', ['pesan' => 'Berhasil edit data']);
    }

    public function hapus($id)
    {
        DataBank::find($id)->delete();

        // $this->emit('success', ['pesan' => 'Berhasil hapus data']);
    }
}
