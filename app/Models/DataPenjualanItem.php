<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPenjualanItem extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    function data_barang() {
        return $this->belongsTo(DataBarang::class, 'data_barang_id', 'id');
    }
}
