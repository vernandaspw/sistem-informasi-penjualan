<div>
    <div class="mt-5">
        <div class="d-flex justify-content-center mt-5">
            <div class="col-3">
                <div class="mb-4 text-center">
                    <h3><b>Register | Daftar</b></h3>
                </div>
                <form wire:submit.prevent='daftar'>
                    <div class="mb-2">
                        <div class="label">Nama lengkap</div>
                        <input class="form-control" type="text" placeholder="nama" wire:model='nama'>
                    </div>
                    <div class="mb-2">
                        <div class="label">Username</div>
                        <input class="form-control" type="text" placeholder="Username" wire:model='username'>
                    </div>
                    <div class="mb-2">
                        <div class="label">Password</div>
                        <input class="form-control" type="text" placeholder="password" wire:model='password'>
                    </div>
                    <button type="submit" class="form-control btn btn-primary">Daftar</button>
                    <button type="button" class="form-control mt-2 btn btn-secondary">Login</button>
                </form>
            </div>
        </div>
    </div>
</div>
