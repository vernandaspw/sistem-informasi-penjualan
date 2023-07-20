<div>
    @if(auth()->user()->role == 'pelanggan')
    <livewire:navbar-customer />
    @else
    <livewire:navbar-admin />
    @endif
   <div class="container-xl">
    <div class="col-md-4 mt-5 pt-4">
        <h4>
            Ubah Password
        </h4>
        <form wire:submit.prevent='ubahData'>
            @if(session('alertSuccess'))
                <div class="alert alert-success">
                    {{ session('alertSuccess') }}
                </div>
            @endif
            @if(session('alert'))
                <div class="alert alert-danger">
                    {{ session('alert') }}
                </div>
            @endif
            <div class="mb-2">
                <label for="">password lama</label>
                <input required wire:model='password_lama' type="text" class="form-control">
            </div>
            <div class="mb-2">
                <label for="">password baru</label>
                <input required wire:model='password_baru' type="text" class="form-control">
            </div>
      
            <button type="submit" class="btn btn-primary form-control">Simpan</button>
        </form>
    </div>
   </div>
</div>
