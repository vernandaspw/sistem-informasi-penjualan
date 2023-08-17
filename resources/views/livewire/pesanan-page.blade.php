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
            {{-- <input wire:model='cari' type="text" class=" form-control rounded-pill mx-2"
                placeholder="cari nama barang..."> --}}
            <!-- Collapsible wrapper -->

            <!-- Right elements -->
            <div class="d-flex align-items-center">
                <!-- Icon -->
                <a href="{{ url('cart') }}" type="button"
                    class="btn p-1 ms-2 me-4 btn-transparent shadow-none position-relative">
                    <i class="fas fa-shopping-cart text-white" style="font-size: 20px"></i>
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill badge-danger">
                        {{ session('cart') ? count(session('cart')) : 0 }}
                        <span class="visually-hidden">unread messages</span>
                    </span>
                </a>
                @if (auth()->check())
                    <a href="{{ url('pesanan') }}" type="button" class=" px-2 me-4 text-white position-relative">
                        <div class="text-center d-flex">Pesanan</div>
                        {{-- <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill badge-danger">
                        2
                        <span class="visually-hidden">unread messages</span>
                    </span> --}}
                    </a>
                @endif


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
    <div class="mt-5 pt-4">
        <div class="container-xl">
            {{-- <div class="kategori">
                <div class="mt-2">
                    <div class="d-flex flex-wrap">
                        <a href="javascript:void()"
                            class="card border shadow-sm px-4 rounded-pill me-2 mb-2">
                            <div class="card-body p-2">
                                Semua
                            </div>
                        </a>
                        <a href="javascript:void()" class="card border shadow-sm px-4 rounded-pill me-2 mb-2">
                            <div class="card-body p-2">
                                PAYMENT
                            </div>
                        </a>
                        <a href="javascript:void()" class="card border shadow-sm px-4 rounded-pill me-2 mb-2">
                            <div class="card-body p-2">
                                PENDING
                            </div>
                        </a>
                        <a href="javascript:void()" class="card border shadow-sm px-4 rounded-pill me-2 mb-2">
                            <div class="card-body p-2">
                                DIKEMAS
                            </div>
                        </a>
                        <a href="javascript:void()" class="card border shadow-sm px-4 rounded-pill me-2 mb-2">
                            <div class="card-body p-2">
                                DIKIRIM
                            </div>
                        </a>
                        <a href="javascript:void()" class="card border shadow-sm px-4 rounded-pill me-2 mb-2">
                            <div class="card-body p-2">
                                DITERIMA
                            </div>
                        </a>
                        <a href="javascript:void()" class="card border shadow-sm px-4 rounded-pill me-2 mb-2">
                            <div class="card-body p-2">
                                SELESAI
                            </div>
                        </a>
                        <a href="javascript:void()" class="card border shadow-sm px-4 rounded-pill me-2 mb-2">
                            <div class="card-body p-2">
                                GAGAL
                            </div>
                        </a>
                    </div>
                </div>
            </div> --}}

            <div class="produk">
                <h4><b>Pesanan saya</b></h4>
                <div class="mt-2">
                    @foreach ($data_penjualans as $data_penjualan)
                        <div class="row mb-2">
                            <div class="col">
                                <div class="card ">
                                    {{-- {{ $data_penjualan->gambar_barangs->first() != null ? }} --}}
                                    <div class="card-body p-3">
                                        <div class="d-flex justify-content-between">
                                            <div class="">{{ $data_penjualan->no_faktur }} - <small
                                                    class="text-muted">{{ $data_penjualan->status }} - <span
                                                        class="@if ($data_penjualan->status_bayar == 'belum') text-danger
                                                        @else
                                                        text-success @endif">{{ $data_penjualan->status_bayar }}
                                                        bayar</span></small></div>
                                        </div>

                                        <h5 class="card-title">{{ $data_penjualan->metode_pengiriman }} -
                                            {{ $data_penjualan->metode_pembayaran }}</h5>
                                        <div class="">
                                            @foreach ($data_penjualan->data_penjualan_item as $dataitem)
                                                {{ $dataitem->data_barang->nama }},
                                            @endforeach
                                        </div>
                                        <h4 class="card-title text-primary">@uang($data_penjualan->total)</h4>
                                        @if ($data_penjualan->status_bayar == 'belum' && $data_penjualan->metode_pembayaran == 'transfer')
                                            <div class="">Segera transfer ke rekening berikut</div>
                                            <div class="">
                                                <ul class="mb-0">
                                                    @foreach ($banks as $bank)
                                                        <li>
                                                            <div class=""><b>{{ $bank->nama_bank }},</b>
                                                                {{ $bank->norek }}

                                                            </div>
                                                            <div>An: {{ $bank->an }}</div>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="card-footer">
                                        @if ($data_penjualan->status_bayar == 'belum')
                                            <button wire:click="sudahBayar('{{ $data_penjualan->id }}')" type="button"
                                                class="btn btn-success">
                                                Sudah bayar
                                            </button>
                                        @endif
                                        @if ($data_penjualan->status == 'DIKIRIM')
                                            <button wire:click="diterima('{{ $data_penjualan->id }}')" type="button"
                                                class="btn btn-primary">
                                                Pesanan Diterima
                                            </button>
                                        @endif
                                    </div>
                                </div>
                            </div>

                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
