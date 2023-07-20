<div>

    <nav class="navbar navbar-expand-lg navbar-dark fixed-top bg-primary">
        <!-- Container wrapper -->
        <div class="container-xl">
            <!-- Toggle button -->
            <button class="navbar-toggler" type="button" data-mdb-toggle="collapse"
                data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>

            <!-- Collapsible wrapper -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Navbar brand -->
                <a class="navbar-brand mt-2 mt-lg-0" href="#">
                    <img src="{{ asset('indosteel.png') }}" height="15" alt="MDB Logo" loading="lazy" />
                    Indosteel Sumber Berkat
                </a>
                <!-- Left links -->
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/', []) }}">Home</a>
                    </li>
                    {{-- <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                            data-mdb-toggle="dropdown" aria-expanded="false">
                            Kategori
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            @foreach ($kategoris as $kategori)
                                <li>
                                    <a class="dropdown-item" href="#">Satuan Barang</a>
                                </li>
                            @endforeach

                        </ul>
                    </li> --}}

                </ul>
                <!-- Left links -->
            </div>
            <input wire:model='cari' type="text" class=" form-control rounded-pill mx-2"
                placeholder="cari nama barang...">
            <!-- Collapsible wrapper -->

            <!-- Right elements -->
            <div class="d-flex align-items-center">
                <!-- Icon -->
                <button type="button" class="btn p-1 ms-2 me-4 btn-transparent shadow-none position-relative">
                    <i class="fas fa-shopping-cart text-white" style="font-size: 20px"></i>
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill badge-danger">
                        {{ session('cart') ? count(session('cart')) : 0 }}
                        <span class="visually-hidden">unread messages</span>
                    </span>
                </button>



                <!-- Avatar -->

                @if (auth()->check())
                    <div class="dropdown">
                        <a class="dropdown-toggle d-flex align-items-center hidden-arrow" href="#"
                            id="navbarDropdownMenuAvatar" role="button" data-mdb-toggle="dropdown"
                            aria-expanded="false">
                            <img src="https://mdbcdn.b-cdn.net/img/new/avatars/2.webp" class="rounded-circle"
                                height="25" alt="Black and White Portrait of a Man" loading="lazy" />
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuAvatar">
                            <li>
                                <a class="dropdown-item" href="#">{{ auth()->user()->nama }}</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ url('ubah-password', []) }}">Ubah password</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="javascript:void()" wire:click='logout'>Logout</a>
                            </li>
                        </ul>
                    </div>
                @else
                    <a href="{{ url('login', []) }}" class="btn btn-secondary me-2">Login</a>
                    <a href="{{ url('daftar', []) }}" class="btn btn-primary">Daftar</a>
                @endif
            </div>
            <!-- Right elements -->
        </div>
        <!-- Container wrapper -->
    </nav>

    <div class="container-xl">
        <div class="mt-5 pt-4">
            <div class="mb-2">
                @if(session('alertError'))
                    <div class="alert alert-danger">
                        {{ session('alertError') }}
                    </div>
                @endif
            </div>
            <table class="table table-borderless">
                <thead class="bg-primary text-white">
                    <th>
                        Alamat Pengiriman
                    </th>
                    <th>

                    </th>

                </thead>
                <tbody>
                    @if($alamat)
                    <tr>
                        <td>
                            <div class="">
                                {{ $alamat->nama }}
                            </div>
                            <div class="">
                                {{ $alamat->no_hp }}
                            </div>
                        </td>
                        <td>
                            {{ $alamat->alamat }}, {{ $alamat->provinsi }}, {{ $alamat->kota }}, {{ $alamat->kecamatan }}, {{ $alamat->kode_pos }}.
                        </td>
                    </tr>
                    @else
                    @if($buatAlamatPage)
                   <tr>
                    <td>
                        <form wire:submit.prevent='buatAlamat'>
                            <div class="mb-2">
                                <label for="">Nama lengkap</label>
                                <input type="text" maxlength="25" required wire:model='alamat_nama' class="form-control">
                            </div>
                            <div class="mb-2">
                                <label for="">No HP</label>
                                <input type="number" maxlength="16" required wire:model='alamat_no_hp' class="form-control">
                            </div>
                            <div class="mb-2">
                                <label for="">Provinsi</label>
                                <input type="text" required wire:model='alamat_provinsi' class="form-control">
                            </div>
                            <div class="mb-2">
                                <label for="">kota / kabupaten</label>
                                <input type="text" required wire:model='alamat_kota' class="form-control">
                            </div>
                            <div class="mb-2">
                                <label for="">kecamatan</label>
                                <input type="text" required wire:model='alamat_kecamatan' class="form-control">
                            </div>
                            <div class="mb-2">
                                <label for="">alamat lengkap</label>
                                <input type="text" required wire:model='alamat_alamat' class="form-control">
                            </div>
                            <div class="mb-2">
                                <label for="">kode pos</label>
                                <input type="number" wire:model='alamat_kode_pos' class="form-control">
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan alamat</button>
                        </form>
                    </td>
                   </tr>
                    @else
                    <tr>
                        <td>
                            <button type="button" wire:click="$toggle('buatAlamatPage')" class="btn btn-primary">Buat Alamat Baru</button>
                        </td>
                    </tr>
                    @endif
                    @endif
                </tbody>
            </table>
            @if (session('cart'))

                <table class="table table-borderless">
                    <thead class="bg-primary text-white">
                        <th>
                            Produk
                        </th>
                        <th>

                        </th>
                        <th>
                            Harga
                        </th>
                        <th>
                            Jumlah
                        </th>
                        <th>
                            Total harga item
                        </th>

                    </thead>
                    <tbody>
                        @foreach (session('cart') as $item)
                            <tr>
                                <td>
                                    <img src="{{ Storage::url($item['img']) }}" width="70" height="70"
                                        alt="">
                                </td>
                                <td>
                                    {{ $item['nama'] }}
                                </td>
                                <td>
                                    @uang($item['harga'])
                                </td>
                                <td>
                                    {{ $item['qty'] }}

                                </td>
                                <td>
                                    @uang($item['total_harga'])
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>


                <div class="d-flex justify-content-between">
                    <div class="">
                        Total barang : {{ session('cart') ? count(session('cart')) : 0 }}
                    </div>
                    <div class="text-end">
                        <div class="">
                            <b>Total Harga Barang : @uang($totalPrice)</b>
                        </div>

                    </div>
                </div>
            @else
                <p>Your cart is empty.</p>
            @endif
            <hr>
            <div class="mb-2">
                <label for="">Metode pengiriman</label>
                <select required wire:model='metode_pengiriman' class="form-control">
                    <option value="">Pilih</option>
                    @if($totalPrice <= 200000)
                    <option value="ambil sendiri">ambil sendiri</option>
                    @elseif($totalPrice > 200000 && $totalQty <= 300)
                    <option value="kurir">kurir</option>
                    @elseif($alamat->kota != 'palembang' && $totalPrice <= 30000000)
                    <option value="ekspedisi">ekspedisi</option>
                    @else
                    <option value="pickup">pickup</option>
                    <option value="truk">truk</option>
                    @endif
                </select>
            </div>
            <div class="mb-2">
                <label for="">Metode pembayaran</label>
                <select required wire:model='metode_pembayaran' class="form-control">
                    <option value="">Pilih</option>
                    @if($metode_pengiriman == 'truk' || $metode_pengiriman == 'ekspedisi')
                    <option value="transfer">transfer</option>
                    @else
                    <option value="cod">cod</option>
                    <option value="transfer">transfer</option>
                    @endif
                </select>
            </div>

            <button wire:click='buatPesanan' class="btn btn-success mt-3 form-control">Buat Pesanan</button>
        </div>
    </div>
</div>
