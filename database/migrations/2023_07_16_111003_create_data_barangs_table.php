<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('data_barangs', function (Blueprint $table) {
            $table->id();
            $table->string('kode_barang',30)->nullable();
            $table->text('nama'); 
            $table->longText('deskripsi'); 
            $table->foreignId('kategori_barang_id')->constrained('kategori_barangs')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('satuan_barang_id')->constrained('satuan_barangs')->onUpdate('cascade')->onDelete('cascade');
            $table->decimal('harga',13,2)->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_barangs');
    }
};
