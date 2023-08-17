<?php

namespace App\Http\Livewire;

use App\Models\DataPenjualan;
use App\Models\KategoriBarang;
use Livewire\Component;

class PesananPage extends Component
{
    public function render()
    {
        $this->cart = session()->get('cart', []);

        $this->kategoris = KategoriBarang::latest()->get();

        $this->data_penjualans = DataPenjualan::where('pelanggan_id', auth()->user()->id)->latest()->get();

        return view('livewire.pesanan-page');
    }

    public function logout()
    {
        auth()->logout();
        session()->flush();
        redirect('login');
    }

    public function sudahBayar($id)
    {
        $d = DataPenjualan::find($id);
        if ($d->status == 'PAYMENT') {
            $d->status = 'PENDING';
        }

        $d->status_bayar = 'sudah';
        $d->save();
    }

    public function diterima($id)
    {
        $d = DataPenjualan::find($id);
        $d->status = 'DITERIMA';
        $d->save();
    }
}
