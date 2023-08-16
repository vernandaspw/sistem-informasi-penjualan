<?php

namespace App\Http\Livewire;

use App\Models\AlamatPelanggan;
use App\Models\DataPenjualan;
use App\Models\DataPenjualanItem;
use App\Models\DataStok;
use Livewire\Component;

class CheckoutPage extends Component
{
    public function render()
    {
        $this->cart = session()->get('cart', []);
        $totalPrice = 0;
        $totalQty = 0;
        foreach ($this->cart as $item) {
            // Asumsikan bahwa harga item tersimpan dalam key 'price'
            // dan jumlah item tersimpan dalam key 'quantity'
            $itemPrice = $item['harga'];
            $itemQuantity = $item['qty'];
            $totalPrice += $itemPrice * $itemQuantity;
            $totalQty += $itemQuantity;
        }
        $this->totalQty = $totalQty;
        $this->totalPrice = $totalPrice;

        // $this->alamats = AlamatPelanggan::get
        $this->alamat = AlamatPelanggan::where('pelanggan_id', auth()->user()->id)->first();

        return view('livewire.checkout-page');
    }

    public $cari;
    public function updated()
    {
        if ($this->cari) {
            redirect('/');
        }
    }
    public function logout()
    {
        auth()->logout();
        session()->flush();
        redirect('login');
    }

    public $totalPrice;
    public $totalQty;

    public $alamat;
    public $buatAlamatPage = false;
    public $alamat_nama;
    public $alamat_no_hp;
    public $alamat_provinsi;
    public $alamat_kota;
    public $alamat_kecamatan;
    public $alamat_kode_pos;
    public $alamat_alamat;

    public function buatAlamat()
    {
        AlamatPelanggan::create([
            'pelanggan_id' => auth()->user()->id,
            'nama' => $this->alamat_nama,
            'no_hp' => $this->alamat_no_hp,
            'provinsi' => $this->alamat_provinsi,
            'kota' => $this->alamat_kota,
            'kecamatan' => $this->alamat_kecamatan,
            'kode_pos' => $this->alamat_kode_pos,
            'alamat' => $this->alamat_alamat,
        ]);

        $this->buatAlamatPage = false;
    }

    public $metode_pengiriman;
    public $metode_pembayaran;
    public $catatan_pelanggan;
    public $subtotal;
    public $ongkir;
    public $diskon;
    public $total;

    public function buatPesanan()
    {
        if ($this->alamat == null) {
            session()->flash('alertError', 'alamat wajib di isi');
            return;
        }
        if ($this->metode_pengiriman == null) {
            session()->flash('alertError', 'metode pengiriman wajib di isi');
            return;
        }
        if ($this->metode_pembayaran == null) {
            session()->flash('alertError', 'metode pembayaran wajib di isi');
            return;
        }
        $timestamp = time();
        $prefix = 'F';
        $random = mt_rand(10000, 99999);
        $no_faktur = $prefix . $timestamp . $random;
        $cek = DataPenjualan::where('no_faktur', $no_faktur)->first();
        if ($cek) {
            $timestamp = time();
            $prefix = 'M';
            $random = mt_rand(1000, 9999);
            $no_faktur = $prefix . $timestamp . $random;
        }
        $pelanggan_id = auth()->user()->id;
        $dp = new DataPenjualan();
        $dp->no_faktur = $no_faktur;
        $dp->pelanggan_id = $pelanggan_id;
        $dp->alamat_pelanggan_id = $this->alamat->id;
        $dp->catatan_pelanggan = $this->catatan_pelanggan;
        $dp->subtotal = $this->totalPrice;
        $dp->ongkir = 0;
        $dp->diskon = 0;
        $dp->total = $this->totalPrice + $this->ongkir - $this->diskon;
        $dp->status = "PAYMENT";
        // $dp->dise = "PAYMENT";
        $dp->save();

        foreach ($this->cart as $item) {
            $dpi = new DataPenjualanItem();
            $dpi->data_penjualan_id = $dp->id;
            $dpi->data_barang_id = $item['id'];
            $dpi->harga = $item['harga'];
            $dpi->qty = $item['qty'];
            // $dpi->satuan_barang_id = $item['']
            $dpi->total_harga = $item['total_harga'];
            $dpi->save();

            // total stok
            $ds = new DataStok();
            $ds->data_barang_id = $item['id'];
            $ds->tipe = 'keluar';
            $ds->stok_jual =  $item['qty'];
            $ds->save();
        }

        session()->forget('cart');

        redirect('/');
    }

}
