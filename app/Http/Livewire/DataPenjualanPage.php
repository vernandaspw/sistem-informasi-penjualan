<?php

namespace App\Http\Livewire;

use App\Models\DataPenjualan;
use Livewire\Component;

class DataPenjualanPage extends Component
{
    public function render()
    {
        $this->datas = DataPenjualan::latest()->get();
        return view('livewire.data-penjualan-page');
    }

    public function sudahBayar($id)
    {
        $d = DataPenjualan::find($id);
        $d->status_bayar = 'sudah';
        $d->save();
    }

    public function kemas($id)
    {
        $d = DataPenjualan::find($id);
        $d->status = 'DIKEMAS';
        $d->save();
    }
    public function dikirim($id)
    {
        $d = DataPenjualan::find($id);
        $d->status = 'DIKIRIM';
        $d->save();

        // $dpi = DataPenjualanItem::
    }
    public function diterima($id)
    {
        $d = DataPenjualan::find($id);
        $d->status = 'DITERIMA';
        $d->save();
    }
    public function selesai($id)
    {
        $d = DataPenjualan::find($id);
        $d->status = 'SELESAI';
        $d->save();
    }
    public function batal($id)
    {
        $d = DataPenjualan::find($id);
        $d->status = 'BATAL';
        $d->save();
    }
}
