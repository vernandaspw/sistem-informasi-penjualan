<div>
    <livewire:navbar-admin />
    <div class="container-xl mt-5 pt-4">
        <div class="mb-3">
            <h3>
                Data Penjualan
            </h3>
        </div>
        <div class="mt-2">

            <div class="mt-2">
                <table class="table table-sm align-middle mb-0 bg-white">
                    <thead class="bg-light">
                        <tr>
                            <th>Dibuat</th>
                            <th>Faktur</th>
                            <th>Pelanggan</th>
                            <th>metode pengiriman</th>
                            <th>metode pembayaran</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th></th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($datas as $data)
                            <tr>
                                <td>{{ $data->created_at }}</td>
                                <td>{{ $data->no_faktur }}</td>
                                <td>{{ $data->pelanggan->nama }}</td>
                                <td>{{ $data->metode_pengiriman }}</td>
                                <td>{{ $data->metode_pembayaran }}</td>
                                <td>@uang($data->total)</td>
                                <td>{{ $data->status }}</td>
                                <td>
                                    @if (auth()->user()->role == 'admin')
                                        @if ($data->status == 'PAYMENT')
                                            {{-- PENDING --}}
                                            @if ($data->status_bayar == 'belum')
                                                <button wire:click="sudahBayar('{{ $data->id }}')"
                                                    class="btn btn-warning">Sudah bayar</button>
                                            @endif
                                        @endif
                                        @if ($data->status != 'PAYMENT')
                                            {{-- PENDING --}}
                                            @if ($data->status_bayar == 'belum')
                                                <button wire:click="sudahBayar('{{ $data->id }}')"
                                                    class="btn btn-warning">Sudah bayar</button>
                                            @endif
                                        @endif

                                        @if ($data->status == 'PENDING')
                                            {{-- dikemas --}}
                                            <button wire:click="kemas('{{ $data->id }}')"
                                                class="btn btn-info">Kemas</button>
                                        @endif
                                        @if ($data->status == 'DIKEMAS' || $data->status == 'PAYMENT')
                                            {{-- dikirim --}}
                                            <button wire:click="dikirim('{{ $data->id }}')"
                                                class="btn btn-primary">dikirim</button>
                                            {{-- NANTI AJA GAGAL --}}
                                        @endif
                                        @if ($data->status == 'DIKIRIM')
                                            <button wire:click="diterima('{{ $data->id }}')"
                                                class="btn btn-success">diterima</button>
                                        @endif
                                        @if ($data->status == 'DITERIMA')
                                        <button wire:click="selesai('{{ $data->id }}')"
                                            class="btn btn-success">selesai</button>
                                            {{-- selesai --}}
                                            @endif
                                            {{-- NANTI AJA BATAL --}}
                                            @if ($data->status_bayar == 'belum')
                                            <button wire:click="batal('{{ $data->id }}')"
                                                class="btn btn-danger">Batal</button>
                                                @endif
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
