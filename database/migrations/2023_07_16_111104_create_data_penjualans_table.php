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
        Schema::create('data_penjualans', function (Blueprint $table) {
            $table->id();
            $table->string('no_faktur', 17);
            $table->foreignId('pelanggan_id')->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('alamat_pelanggan_id')->constrained('alamat_pelanggans')->onUpdate('cascade')->onDelete('cascade');
            $table->longText('catatan_pelanggan')->nullable();

            $table->enum('metode_pengiriman', ['ambil sendiri', 'kurir', 'pickup', 'truk', 'ekspedisi']);
            $table->enum('metode_pembayaran', ['cod', 'transfer']);

            $table->decimal('subtotal', 13, 2)->default(0);
            $table->decimal('ongkir', 13, 2)->default(0);
            $table->decimal('diskon', 13, 2)->default(0);
            $table->decimal('total', 13, 2)->default(0);
            $table->enum('status', ['PAYMENT', 'PENDING', 'DIKEMAS', 'DIKIRIM', 'DITERIMA', 'SELESAI', 'GAGAL', "BATAL"]);

            $table->string('no_mobil', 10)->nullable();
            $table->string('nama_sopir', 25)->nullable();
            $table->foreignId('disetujui_oleh')->nullable()->constrained('users')->onUpdate('cascade')->onDelete('set null');
            $table->foreignId('dikirim_oleh')->nullable()->constrained('users')->onUpdate('cascade')->onDelete('set null');
            $table->foreignId('diterima_oleh')->nullable()->constrained('users')->onUpdate('cascade')->onDelete('set null');
            $table->foreignId('dibuat_oleh')->nullable()->constrained('users')->onUpdate('cascade')->onDelete('set null');
            $table->longText('keterangan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_penjualans');
    }
};
