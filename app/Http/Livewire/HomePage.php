<?php

namespace App\Http\Livewire;

use App\Models\DataBarang;
use App\Models\KategoriBarang;
use Livewire\Component;

class HomePage extends Component
{
    public function render()
    {
        $this->cart = session()->get('cart', []);


        $this->kategoris = KategoriBarang::latest()->get();

        $db = DataBarang::latest();
        if ($this->kategori_barang_id) {
            $db->where('kategori_barang_id', $this->kategori_barang_id);
        }
        if ($this->cari) {
            $db->where('nama', 'like', '%' . $this->cari . '%');
        }
        $this->data_barangs = $db->get();
        return view('livewire.home-page');
    }

    public function logout()
    {
        auth()->logout();
        session()->flush();
        redirect('login');
    }

    public $cari;
    protected $listeners = ['nextData'];
    public $take = 12;
    public function nextData()
    {
        $this->take += 12;
    }

    public $kategori_barang_id;

    public $barang_qty;
    public $totalPrice;

    public function addCart($id)
    {
        $barang = DataBarang::find($id);
        $qty = $this->barang_qty != null ? $this->barang_qty : 1;

        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['img'] = $barang->gambar_barangs->first() ? $barang->gambar_barangs->first()->img : null;
            $cart[$id]['nama'] = $barang->nama;
            $cart[$id]['harga'] = $barang->harga;
            $cart[$id]['qty'] += $qty;
            $cart[$id]['total_harga'] = $cart[$id]['harga'] * $cart[$id]['qty'];
        } else {
            $cart[$id] = [
                'id' => $barang->id,
                'nama' => $barang->nama,
                'img' => $barang->gambar_barangs->first() ? $barang->gambar_barangs->first()->img : null,
                'harga' => $barang->harga,
                'qty' => $qty,
                'total_harga' => $barang->harga * $qty,
            ];
        }

        session()->put('cart', $cart);

    }


}
