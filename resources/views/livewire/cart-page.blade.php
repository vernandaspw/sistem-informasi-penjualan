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
            <h4>Keranjang Belanja</h4>
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
                        <th>

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
                                    <div class="input-group mb-3">
                                        <button wire:click="tambahQty('{{ $item['id'] }}')"
                                            class="btn btn-outline-primary" type="button" data-mdb-ripple-color="dark">
                                            +
                                        </button>

                                        @if ($item['id'] == $ID)
                                            <input wire:model.lazy='input_barang_qty' min="1" type="number"
                                                class="form-control text-center" style="max-width: 70px" placeholder=""
                                                aria-label="Example text with two button addons" />
                                        @else
                                            <button wire:click="editQty('{{ $item['id'] }}')"
                                                class="btn btn-outline-primary" type="button"
                                                data-mdb-ripple-color="dark">
                                                {{ $item['qty'] }}
                                            </button>
                                        @endif
                                        <button wire:click="kurangQty('{{ $item['id'] }}')"
                                            class="btn btn-outline-primary" type="button" data-mdb-ripple-color="dark">
                                            -
                                        </button>

                                    </div>

                                </td>
                                <td>
                                    @uang($item['total_harga'])
                                </td>
                                <td>
                                    <button class="btn btn-danger"
                                        wire:click="hapusItemCart('{{ $item['id'] }}')">hapus</button>
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
                        <a href="{{ url('checkout', []) }}" class="btn btn-success mt-3">Checkout</a>
                    </div>
                </div>
            @else
                <p>Your cart is empty.</p>
            @endif
        </div>
    </div>
</div>
