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
        Schema::create('data_penjualan_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('data_penjualan_id')->constrained('data_penjualans')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('data_barang_id')->constrained('data_barangs')->onUpdate('cascade')->onDelete('cascade');
            $table->decimal('harga',13,2)->default(0);
            $table->integer('qty');
            $table->foreignId('satuan_barang_id')->nullable()->constrained('satuan_barangs')->onUpdate('cascade')->onDelete('set null');
            $table->decimal('total_harga',13,2)->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_penjualan_items');
    }
};
