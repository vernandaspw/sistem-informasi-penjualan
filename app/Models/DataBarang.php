<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataBarang extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function kategori_barang()
    {
        return $this->belongsTo(KategoriBarang::class, 'kategori_barang_id', 'id');
    }

    public function satuan_barang()
    {
        return $this->belongsTo(SatuanBarang::class, 'satuan_barang_id', 'id');
    }

    public function gambar_barangs()
    {
        return $this->hasMany(GambarBarang::class);
    }
    public function data_stok()
    {
        return $this->hasMany(DataStok::class);
    }
}
