<div>
    <livewire:navbar-admin />
    <div class="container-xl mt-5 pt-4">
        <div class="mb-3">
            <h3>
                data akun
            </h3>
            <div class="mt-2">
                <button wire:click="$toggle('buatPage')" type="button" class="btn btn-primary">Baru</button>
            </div>
        </div>
        <div class="mt-2">
            @if ($buatPage)
                <div class="col-md-4">
                    <h4>
                        Buat akun baru
                    </h4>

                    <form wire:submit.prevent='buatData'>
                        <div class="mb-2">
                            <label for="">Nama user</label>
                            <input required wire:model='nama' maxlength="40" type="text" class="form-control">
                        </div>
                        <div class="mb-2">
                            <label for="">Username</label>
                            <input required wire:model='username' maxlength="20" type="text" class="form-control">
                        </div>
                        <div class="mb-2">
                            <label for="">Password</label>
                            <input required wire:model='password' type="text" class="form-control">
                        </div>
                        <div class="mb-2">
                            <label for="">role</label>
                            <select required wire:model='role' class="form-control" id="">
                                <option value="pimpinan">pimpinan</option>
                                <option value="admin">admin</option>
                                <option value="gudang">gudang</option>
                            </select>
                        </div>
                        <div class="mb-2">
                            <label for="">Status</label>
                            <select required wire:model='role' class="form-control" id="">
                                <option value="1">Aktif</option>
                                <option value="0">Tidak aktif</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary form-control">Simpan</button>
                    </form>
                </div>
            @elseif($editPage)
                <div class="col-md-4">
                    <h4>
                        Edit akun user
                    </h4>

                    <form wire:submit.prevent='editData'>
                        <div class="mb-2">
                            <label for="">Nama user</label>
                            <input required wire:model='nama' maxlength="40" type="text" class="form-control">
                        </div>
                        <div class="mb-2">
                            <label for="">Username</label>
                            <input required wire:model='username' maxlength="20" type="text" class="form-control">
                        </div>
                        <div class="mb-2">
                            <label for="">Password</label>
                            <input required wire:model='password' type="text" class="form-control">
                        </div>
                        <div class="mb-2">
                            <label for="">role</label>
                            <select required wire:model='role' class="form-control" id="">
                                <option value="pimpinan">pimpinan</option>
                                <option value="admin">admin</option>
                                <option value="gudang">gudang</option>
                            </select>
                        </div>
                        <div class="mb-2">
                            <label for="">Status</label>
                            <select required wire:model='role' class="form-control" id="">
                                <option value="1">Aktif</option>
                                <option value="0">Tidak aktif</option>
                            </select>
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
                            <th>Nama User</th>
                            <th>Username</th>
                            <th>Role</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($datas as $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $data->nama }}</td>
                                <td>{{ $data->username }}</td>
                                <td>{{ $data->role }}</td>
                                <td>{{ $data->isaktif ? 'aktif' : 'tidak aktif' }}</td>
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
