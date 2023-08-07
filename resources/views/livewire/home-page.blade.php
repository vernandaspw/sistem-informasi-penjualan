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
                        <span
                            class="position-absolute top-0 start-100 translate-middle badge rounded-pill badge-danger">
                            2
                            <span class="visually-hidden">unread messages</span>
                        </span>
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
            <div class="kategori">
                <h4><b>Kategori barang</b></h4>
                <div class="mt-2">
                    <div class="d-flex flex-wrap">
                        <a href="javascript:void()" wire:click="$set('kategori_barang_id', null)"
                            class="card border shadow-sm px-4 rounded-pill me-2 mb-2">
                            <div class="card-body p-2">
                                Semua
                            </div>
                        </a>
                        @foreach ($kategoris as $kategori)
                            <a href="javascript:void()" wire:click="$set('kategori_barang_id', {{ $kategori->id }})"
                                class="card border shadow-sm px-4 rounded-pill me-2 mb-2">
                                <div class="card-body p-2">
                                    {{ $kategori->nama }}
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="produk">
                <h4><b>Barang Terbaru</b></h4>
                <div class="mt-2">
                    <div class="row row-cols-1 row-cols-md-4 g-4">
                        @foreach ($data_barangs as $data_barang)
                            <div class="col">
                                <div class="card h-100">
                                    {{-- {{ $data_barang->gambar_barangs->first() != null ? }} --}}
                                    <img src="{{ $data_barang->gambar_barangs->first() != null ? Storage::url($data_barang->gambar_barangs->first()->img) : asset('indosteel.png') }}"
                                        class="card-img-top" height="200" alt="Hollywood Sign on The Hill" />
                                    <div class="card-body">
                                        <div class="">
                                            <small class="text-muted">{{ $data_barang->kategori_barang->nama }}</small>
                                        </div>
                                        <h5 class="card-title">{{ $data_barang->nama }}</h5>
                                        <h4 class="card-title text-primary">@uang($data_barang->harga)</h4>
                                        <p class="card-text">
                                            {{ $data_barang->deskripsi }}
                                        </p>
                                        <div class="">
                                            Stok tersedia
                                            {{ $data_barang->data_stok->where('tipe', 'masuk')->sum('stok_jual') - $data_barang->data_stok->where('tipe', 'keluar')->sum('stok_jual') }}
                                        </div>

                                    </div>
                                    <div class="card-footer">
                                        <form wire:submit.prevent="addCart('{{ $data_barang->id }}')">
                                            <input type="text" hidden wire:model='barang_qty' value="1">
                                            <button @if (auth()->user()->role != 'pelanggan') disabled @endif
                                                @if (
                                                    $data_barang->data_stok->where('tipe', 'masuk')->sum('stok_jual') -
                                                        $data_barang->data_stok->where('tipe', 'keluar')->sum('stok_jual') <
                                                        1) disabled @endif type="submit"
                                                class="btn btn-primary form-control">

                                                @if (auth()->user()->role != 'pelanggan')
                                                Kamu bukan pelanggan
                                                @else
                                                <i class="fas fa-shopping-cart text-white"></i> &nbsp;Tambah ke Keranjang
                                                @endif
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
