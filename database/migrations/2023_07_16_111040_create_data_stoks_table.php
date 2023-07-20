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
        Schema::create('data_stoks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('data_barang_id')->constrained('data_barangs')->onUpdate('cascade')->onDelete('cascade');
            $table->enum('tipe', ['masuk', 'keluar']);
            $table->bigInteger('stok_jual')->default(0);
            $table->bigInteger('stok_fisik')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_stoks');
    }
};
