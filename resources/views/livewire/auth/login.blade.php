@section('title', 'Login')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/bootstrap-social/bootstrap-social.css') }}">
@endpush


<div>
    <div class="card card-primary">
        <div class="card-header">
            <h4>Login</h4>
        </div>

        <div class="card-body">
            <form class="needs-validation" wire:submit.prevent="submit">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" class="form-control" name="email" tabindex="1" required
                        autofocus wire:model="email">
                    <div class="invalid-feedback">
                        Please fill in your email
                    </div>
                </div>

                <div class="form-group">
                    <div class="d-block">
                        <label for="password" class="control-label">Password</label>
                    </div>
                    <input id="password" type="password" class="form-control" name="password" tabindex="2" required
                        wire:model="password">
                    <div class="invalid-feedback">
                        please fill in your password
                    </div>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                        Login <div wire:loading.delay.longer>...</div>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>


@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/sweetalert/dist/sweetalert.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script>
        document.addEventListener('livewire:initialized', () => {
            @this.on('show-error', ({
                message = "Something went wrong!"
            }) => {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: message,
                })
            })
        })
    </script>
@endpush
