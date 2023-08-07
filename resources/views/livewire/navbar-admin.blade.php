<div>
    <!-- Navbar -->
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
                    ISB
                </a>
                <!-- Left links -->
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('dashboard', []) }}">Dashboard</a>
                    </li>
                    @if (auth()->user()->role == 'admin' || auth()->user()->role == 'pimpinan')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('data-penjualan', []) }}">Data Penjualan</a>
                        </li>
                    @endif
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('data-barang', []) }}">Data Barang</a>
                    </li>
                    @if (auth()->user()->role != 'pimpinan')
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink"
                                role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                                Master
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                @if (auth()->user()->role == 'gudang' || auth()->user()->role == 'admin')
                                    <li>
                                        <a class="dropdown-item" href="{{ url('satuan-barang', []) }}">Satuan Barang</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ url('kategori-barang', []) }}">Kategori
                                            Barang</a>
                                    </li>
                                @endif
                                @if (auth()->user()->role == 'admin')
                                    <li>
                                        <a class="dropdown-item" href="{{ url('data-bank', []) }}">Data Bank</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ url('data-akun', []) }}">Data Akun</a>
                                    </li>
                                @endif
                            </ul>
                        </li>
                    @endif

                </ul>
                <!-- Left links -->
            </div>
            <!-- Collapsible wrapper -->

            <!-- Right elements -->
            <div class="d-flex align-items-center">
                <!-- Icon -->


                <!-- Notifications -->

                <!-- Avatar -->

                <div class="dropdown">
                    <a class="dropdown-toggle d-flex align-items-center hidden-arrow" href="#"
                        id="navbarDropdownMenuAvatar" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                        <div class="me-1">
                            {{ auth()->user()->nama }}
                        </div>
                        <img src="https://mdbcdn.b-cdn.net/img/new/avatars/2.webp" class="rounded-circle" height="25"
                            alt="Black and White Portrait of a Man" loading="lazy" />
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuAvatar">

                        <li>
                            <a class="dropdown-item" href="javascript:void()">{{ auth()->user()->role }}</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ url('ubah-password', []) }}">Ubah password</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="javascript:void()" wire:click='logout'>Logout</a>
                        </li>
                    </ul>
                </div>

            </div>
            <!-- Right elements -->
        </div>
        <!-- Container wrapper -->
    </nav>
    <!-- Navbar -->
</div>
