<div>
    <livewire:navbar-admin />
    <div class="container-xl mt-5 pt-4">
        <div class="mb-3">
            <h3>
                data bank
            </h3>
            <div class="mt-2">
                <button wire:click="$toggle('buatPage')" type="button" class="btn btn-primary">Baru</button>
            </div>
        </div>
        <div class="mt-2">
            @if ($buatPage)
                <div class="col-md-4">
                    <h4>
                        Buat data bank baru
                    </h4>

                    <form wire:submit.prevent='buatData'>
                        <div class="mb-2">
                            <label for="">Nama Bank</label>
                            <input required wire:model='nama_bank' type="text" class="form-control">
                        </div>
                        <div class="mb-2">
                            <label for="">Nomor Rekening</label>
                            <input required wire:model='norek' type="number" class="form-control">
                        </div>
                        <div class="mb-2">
                            <label for="">Atas Nama</label>
                            <input required wire:model='an' type="text" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary form-control">Simpan</button>
                    </form>
                </div>
            @elseif($editPage)
                <div class="col-md-4">
                    <h4>
                        Edit data bank
                    </h4>

                    <form wire:submit.prevent='editData'>
                        <div class="mb-2">
                            <label for="">Nama Bank</label>
                            <input required wire:model='nama_bank' type="text" class="form-control">
                        </div>
                        <div class="mb-2">
                            <label for="">Nomor Rekening</label>
                            <input required wire:model='norek' type="number" class="form-control">
                        </div>
                        <div class="mb-2">
                            <label for="">Atas Nama</label>
                            <input required wire:model='an' type="text" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary form-control">Simpan</button>
                    </form>
                </div>
            @endif
            <div class="mt-2">
                <table class="table table-sm align-middle mb-0 bg-white">
                    <thead class="bg-light">
                        <tr>
                            <th>No.</th>
                            <th>Nama Bank</th>
                            <th>No Rekening</th>
                            <th>Atas Nama</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($datas as $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $data->nama_bank }}</td>
                                <td>{{ $data->norek }}</td>
                                <td>{{ $data->an }}</td>
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
