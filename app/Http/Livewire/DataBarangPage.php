<?php

namespace App\Http\Livewire;

use App\Models\DataBarang;
use App\Models\DataStok;
use App\Models\GambarBarang;
use App\Models\KategoriBarang;
use App\Models\SatuanBarang;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class DataBarangPage extends Component
{
    public function render()
    {
        $this->datas = DataBarang::latest()->get();

        $this->kategori_barangs = KategoriBarang::latest()->get();
        $this->satuan_barangs = SatuanBarang::latest()->get();
        return view('livewire.data-barang-page');
    }

    use WithFileUploads;

    public $buatPage = false;

    public $kategori_barangs = [];
    public $satuan_barangs = [];
    public $img;
    public $nama, $deskripsi, $kode_barang, $harga, $kategori_barang_id, $satuan_barang_id;
    public $stok;
    public function buatData()
    {
        $d = new DataBarang();
        $d->kode_barang = $this->kode_barang;
        $d->nama = $this->nama;
        $d->deskripsi = $this->deskripsi;
        $d->kategori_barang_id = $this->kategori_barang_id;
        $d->satuan_barang_id = $this->satuan_barang_id;
        $d->harga = $this->harga;
        $d->save();

        if ($this->img) {
            foreach ($this->img as $images) {
                $store_img = $images->store('produk');
                GambarBarang::create([
                    'data_barang_id' => $d->id,
                    'img' => $store_img,
                ]);
            }
            $this->img = null;
        }

        if ($this->stok) {
            DataStok::create([
               'data_barang_id' => $d->id,
               'tipe' => 'masuk',
               'stok_jual' => $this->stok,
               'stok_fisik' => $this->stok,
            ]);
        }

        $this->buatPage = false;

        // $this->emit('success', ['pesan' => 'Berhasil buat data']);
    }

    public $editPage = false;
    public $ID;

    public $galeris = [];

    public $stok_jual, $stok_fisik;
    public $tipeStok = 'masuk';
    public $tipeStokJual;
    public $tipeStokFisik;
    public $edit_stok_fisik;
    public $edit_stok_jual;

    public function editPageTrue($id)
    {
        $d = DataBarang::find($id);
        $this->ID = $id;
        $this->kode_barang = $d->kode_barang;
        $this->nama = $d->nama;
        $this->deskripsi = $d->deskripsi;
        $this->kategori_barang_id = $d->kategori_barang_id;
        $this->satuan_barang_id = $d->satuan_barang_id;
        $this->harga = $d->harga;

        $this->galeris = GambarBarang::where('data_barang_id', $this->ID)->get();
        $this->stok_jual = $d->data_stok->sum('stok_jual');
        $this->stok_fisik = $d->data_stok->sum('stok_fisik');

        $this->editPage = true;
    }

    public function editData()
    {
        $d = DataBarang::find($this->ID);
        $d->kode_barang = $this->kode_barang;
        $d->nama = $this->nama;
        $d->deskripsi = $this->deskripsi;
        $d->kategori_barang_id = $this->kategori_barang_id;
        $d->satuan_barang_id = $this->satuan_barang_id;
        $d->harga = $this->harga;
        $d->save();

        if ($this->tipeStok == 'masuk') {

            if ($this->edit_stok_jual) {
                DataStok::create([
                    'data_barang_id' => $d->id,
                    'tipe' => 'masuk',
                    'stok_jual' => $this->edit_stok_jual,
                 ]);
            }
            if ($this->edit_stok_fisik) {
                DataStok::create([
                    'data_barang_id' => $d->id,
                    'tipe' => 'masuk',
                    'stok_fisik' => $this->edit_stok_fisik,
                 ]);
            }

        }else{
            if ($this->edit_stok_jual) {
                DataStok::create([
                    'data_barang_id' => $d->id,
                    'tipe' => 'keluar',
                    'stok_jual' => $this->edit_stok_jual,
                 ]);
            }
            if ($this->edit_stok_fisik) {
                DataStok::create([
                    'data_barang_id' => $d->id,
                    'tipe' => 'keluar',
                    'stok_fisik' => $this->edit_stok_fisik,
                 ]);
            }
        }


        if ($this->img) {
            // cek apakah punya gambar
            $cekImgs = GambarBarang::where('data_barang_id', $this->ID)->get();
            if ($cekImgs->count() > 0) {
                // hapus data
                foreach ($cekImgs as $cekImg) {
                    Storage::delete($cekImg->img);
                    GambarBarang::find($cekImg->id)->delete();
                }
                // buat galeri
                foreach ($this->img as $images) {
                    $store_img = $images->store('produk');
                    GambarBarang::create([
                        'data_barang_id' => $d->id,
                        'img' => $store_img,
                    ]);
                }
            } else {
                foreach ($this->img as $images) {
                    $store_img = $images->store('produk');
                    GambarBarang::create([
                        'data_barang_id' => $d->id,
                        'img' => $store_img,
                    ]);
                }
            }
            $this->img = null;
        }

        $this->editPage = false;

        // $this->emit('success', ['pesan' => 'Berhasil edit data']);
    }

    public function hapus($id)
    {
        DataBarang::find($id)->delete();

        // $this->emit('success', ['pesan' => 'Berhasil hapus data']);
    }
}
