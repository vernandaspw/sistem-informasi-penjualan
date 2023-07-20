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
        Schema::create('gambar_barangs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('data_barang_id')->constrained('data_barangs')->onUpdate('cascade')->onDelete('cascade');
            $table->string('img', 80);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gambar_barangs');
    }
};
