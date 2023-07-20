<div>
    <div class="mt-5">
        <div class="d-flex justify-content-center mt-5">
            <div class="col-3">
                <div class="mb-4 text-center">
                    <h3><b>Login | Masuk</b></h3>
                </div>
                <form wire:submit.prevent='login'>
                    <div class="mb-2">
                        <div class="label">Username</div>
                        <input required class="form-control" type="text" placeholder="Username" wire:model='username'>
                        @error('username')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                    <div class="mb-2">
                        <div class="label">Password</div>
                        <input required class="form-control" type="password" placeholder="password" wire:model='password'>
                    </div>
                    <button type="submit" class="form-control btn btn-primary">Login</button>
                    <a href="{{ url('daftar', []) }}" type="button" class="form-control mt-2 btn btn-secondary">Daftar</a>
                </form>
            </div>
        </div>
    </div>
</div>
