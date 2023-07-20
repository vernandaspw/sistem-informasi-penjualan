<?php

use App\Http\Livewire\CartPage;
use App\Http\Livewire\CheckoutPage;
use App\Http\Livewire\DaftarPage;
use App\Http\Livewire\DashboardPage;
use App\Http\Livewire\DataAkunPage;
use App\Http\Livewire\DataBankPage;
use App\Http\Livewire\DataBarangPage;
use App\Http\Livewire\DataPenjualanPage;
use App\Http\Livewire\HomePage;
use App\Http\Livewire\KategoriBarangPage;
use App\Http\Livewire\LoginPage;
use App\Http\Livewire\PesananDetailPage;
use App\Http\Livewire\PesananPage;
use App\Http\Livewire\ProdukDetailPage;
use App\Http\Livewire\SatuanBarangPage;
use App\Http\Livewire\UbahPasswordPage;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
 */

Route::get('login', LoginPage::class)->name('login');
Route::get('daftar', DaftarPage::class);
Route::get('/', HomePage::class);
Route::get('produk/{id}', ProdukDetailPage::class);

Route::middleware(['auth'])->group(function () {
    Route::get('dashboard', DashboardPage::class);

    Route::get('satuan-barang', SatuanBarangPage::class);
    Route::get('kategori-barang', KategoriBarangPage::class);
    Route::get('data-bank', DataBankPage::class);
    Route::get('data-akun', DataAkunPage::class);

    Route::get('data-barang', DataBarangPage::class);
    Route::get('data-penjualan', DataPenjualanPage::class);

    Route::get('ubah-password', UbahPasswordPage::class);

    Route::get('cart', CartPage::class);
    Route::get('checkout', CheckoutPage::class);

    Route::get('pesanan', PesananPage::class);
    Route::get('pesanan-detail/{id}', PesananDetailPage::class);

});
