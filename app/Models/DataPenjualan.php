<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPenjualan extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    function data_penjualan_item() {
        return $this->hasMany(DataPenjualanItem::class);
    }

    function pelanggan() {
        return $this->belongsTo(User::class, 'pelanggan_id', 'id');
    }
}
