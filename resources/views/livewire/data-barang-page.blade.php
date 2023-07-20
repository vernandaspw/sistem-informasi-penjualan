<div>
    <livewire:navbar-admin />
    <div class="container-xl mt-5 pt-4">
        <div class="mb-3">
            <h3>
                Data Barang
            </h3>
            <div class="mt-2">
                <button wire:click="$toggle('buatPage')" type="button" class="btn btn-primary">Baru</button>
            </div>
        </div>
        <div class="mt-2">
            @if ($buatPage)
                <div class="col-md-4">
                    <h4>
                        Buat Data Barang baru
                    </h4>
                    <form wire:submit.prevent='buatData'>
                        <div class="mb-2">
                            <label for="">kode barang (opsional)</label>
                            <input wire:model='kode_barang' type="text" class="form-control">
                        </div>
                        <div class="mb-2">
                            <label for="">Nama barang</label>
                            <input required wire:model='nama' type="text" class="form-control">
                        </div>
                        <div class="mb-2">
                            <label for="">Deskripsi barang</label>
                            <input required wire:model='deskripsi' type="text" class="form-control">
                        </div>
                        <div class="mb-2">
                            <label for="">Harga barang</label>
                            <input required wire:model='harga' type="number" class="form-control">
                        </div>
                        <div class="mb-2">
                            <label for="">Kategori</label>
                            <select required wire:model='kategori_barang_id' class="form-control">
                                <option value="">Pilih</option>
                                @foreach ($kategori_barangs as $kategori_barang)
                                    <option value="{{ $kategori_barang->id }}">{{ $kategori_barang->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-2">
                            <label for="">Satuan</label>
                            <select required wire:model='satuan_barang_id' class="form-control">
                                <option value="">Pilih</option>
                                @foreach ($satuan_barangs as $satuan_barang)
                                    <option value="{{ $satuan_barang->id }}">{{ $satuan_barang->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        @if ($img)
                            <div class="">
                                Photo Preview:
                            </div>
                            @foreach ($img as $img_item)
                                <img src="{{ $img_item != null ? $img_item->temporaryUrl() : '' }}" class="me-1 mb-1"
                                    width="70" height="70">
                            @endforeach
                        @endif
                        <div class="mb-2">
                            <label for="">Gambar barang</label>
                            <input type="file" wire:model='img' class="form-control" multiple>
                        </div>
                        <button type="submit" class="btn btn-primary form-control">Simpan</button>
                        <button wire:click="$toggle('buatPage')" type="button" class="btn btn-secondary form-control mt-2">Tutup</button>
                    </form>
                </div>
            @elseif($editPage)
                <div class="col-md-4">
                    <h4>
                        Edit Data Barang
                    </h4>

                    <form wire:submit.prevent='editData'>
                        <div class="mb-2">
                            <label for="">kode barang (opsional)</label>
                            <input wire:model='kode_barang' type="text" class="form-control">
                        </div>
                        <div class="mb-2">
                            <label for="">Nama barang</label>
                            <input required wire:model='nama' type="text" class="form-control">
                        </div>
                        <div class="mb-2">
                            <label for="">Deskripsi barang</label>
                            <input required wire:model='deskripsi' type="text" class="form-control">
                        </div>
                        <div class="mb-2">
                            <label for="">Harga barang</label>
                            <input required wire:model='harga' type="number" class="form-control">
                        </div>
                        <div class="mb-2">
                            <label for="">Kategori</label>
                            <select required wire:model='kategori_barang_id' class="form-control">
                                <option value="">Pilih</option>
                                @foreach ($kategori_barangs as $kategori_barang)
                                    <option value="{{ $kategori_barang->id }}">{{ $kategori_barang->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-2">
                            <label for="">Satuan</label>
                            <select required wire:model='satuan_barang_id' class="form-control">
                                <option value="">Pilih</option>
                                @foreach ($satuan_barangs as $satuan_barang)
                                    <option value="{{ $satuan_barang->id }}">{{ $satuan_barang->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        @if ($img)
                            <div class="">
                                Photo Preview:
                            </div>
                            @foreach ($img as $img_item)
                                <img src="{{ $img_item != null ? $img_item->temporaryUrl() : '' }}" class="me-1 mb-1"
                                    width="70" height="70">
                            @endforeach
                            @else
                            <div class="">
                                Gambar barang:
                            </div>
                            @foreach ($galeris as $galeri)
            
                                <img src="{{ Storage::url($galeri->img)  }}" class="me-1 mb-1"
                                    width="70" height="70">
                            @endforeach
                        @endif
                        <div class="mb-2">
                            <label for="">Gambar barang</label>
                            <input type="file" wire:model='img' class="form-control" multiple>
                        </div>
                        <button type="submit" class="btn btn-primary form-control">Simpan</button>
                        <button wire:click="$toggle('editPage')" type="button" class="btn btn-secondary form-control mt-2">Tutup</button>
                    </form>
                </div>
            @endif
            <div class="mt-2">
                <table class="table table-sm align-middle mb-0 bg-white">
                    <thead class="bg-light">
                        <tr>
                            <th>No.</th>
                            <th>Kode barang</th>
                            <th>Nama</th>
                            <th>Harga</th>
                            <th>Kategori</th>
                            <th>Satuan</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($datas as $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $data->kode_barang }}</td>
                                <td>{{ $data->nama }}</td>
                                <td>@uang($data->harga)</td>
                                <td>{{ $data->kategori_barang->nama }}</td>
                                <td>{{ $data->satuan_barang->nama }}</td>
                                <td>
                                    <button wire:click="editPageTrue('{{ $data->id }}')" type="button"
                                        class="btn btn-warning btn-sm btn-rounded">
                                        Edit
                                    </button>
                                    <button wire:click="hapus('{{ $data->id }}')" type="button"
                                        class="btn btn-danger btn-sm btn-rounded">
                                        Hapus
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
