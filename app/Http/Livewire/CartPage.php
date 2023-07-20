<?php

namespace App\Http\Livewire;

use App\Models\DataBarang;
use Livewire\Component;

class CartPage extends Component
{
    public function render()
    {
        $this->cart = session()->get('cart', []);
        $totalPrice = 0;
        foreach ($this->cart as $item) {
            // Asumsikan bahwa harga item tersimpan dalam key 'price'
            // dan jumlah item tersimpan dalam key 'quantity'
            $itemPrice = $item['harga'];
            $itemQuantity = $item['qty'];
            $totalPrice += $itemPrice * $itemQuantity;
        }
        $this->totalPrice = $totalPrice;
        return view('livewire.cart-page');
    }

    public $totalPrice;

    public function hapusItemCart($id)
    {
        $cart = session()->get('cart', []);

        // Cek apakah item dengan product_id tertentu ada di dalam cart
        if (array_key_exists($id, $cart)) {
            unset($cart[$id]);
            session()->put('cart', $cart);

            // return redirect()->back()->with('success', 'Produk telah dihapus dari keranjang.');
        } else {
            // return redirect()->back()->with('error', 'Produk tidak ditemukan dalam keranjang.');
        }
    }

    public function tambahQty($id)
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

    public $ID;
    public $barang_qty;
    public $input_barang_qty;

    public function updated()
    {
        if ($this->input_barang_qty) {
            $cart = session()->get('cart', []);
            $cart[$this->ID]['qty'] = $this->input_barang_qty;
            session()->put('cart', $cart);
        }
        if ($this->cari) {
            redirect('/');
        }
    }

    public function editQty($id)
    {
        $cart = session()->get('cart', []);
        $this->ID = $id;
        $this->input_barang_qty = $cart[$id]['qty'];
    }

    public function kurangQty($id)
    {
        $barang = DataBarang::find($id);
        $qty = $this->barang_qty != null ? $this->barang_qty : 1;

        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            if ($cart[$id]['qty'] == 1) {
                // Cek apakah item dengan product_id tertentu ada di dalam cart
                if (array_key_exists($id, $cart)) {
                    unset($cart[$id]);
                    session()->put('cart', $cart);

                    // return redirect()->back()->with('success', 'Produk telah dihapus dari keranjang.');
                } else {
                    // return redirect()->back()->with('error', 'Produk tidak ditemukan dalam keranjang.');
                }

            } else {
                $cart[$id]['img'] = $barang->gambar_barangs->first() ? $barang->gambar_barangs->first()->img : null;
                $cart[$id]['nama'] = $barang->nama;
                $cart[$id]['harga'] = $barang->harga;
                $cart[$id]['qty'] -= $qty;
                $cart[$id]['total_harga'] = $cart[$id]['harga'] * $cart[$id]['qty'];
            }

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

    public function logout()
    {
        auth()->logout();
        session()->flush();
        redirect('login');
    }
    public $cari;

}
