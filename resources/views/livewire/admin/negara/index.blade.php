@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" type="text/css" href="{{ asset('/library/flag-icon-css/css/flag-icon.css') }}">
@endpush


<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>{{ $title }}</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Master Data</a></div>
                <div class="breadcrumb-item"><a href="{{ route('admin.negara') }}">{{ $title }}</a></div>
            </div>
        </div>

        <div class="section-body">
            <livewire:admin.negara.table />
        </div>
    </section>
    <livewire:admin.negara.form />
</div>


@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/jquery-ui-dist/jquery-ui.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/components-table.js') }}"></script>
    <script>
        document.addEventListener('livewire:initialized', () => {
            @this.on('show-message', (data) => {
                data = data[0];
                Swal.fire({
                    icon: data.icon,
                    title: data.title,
                    text: data.message,
                })
            })

            @this.on('show-form', (data) => {
                @this.set('id', null)
                @this.set('nama', null)
                if (data.length === 0) {
                    @this.dispatch('updateForm', {
                        title: "Create Negara",
                        btnName: "Save",
                    })
                } else {
                    data = data[0];
                    @this.dispatch('updateForm', {
                        title: "Update Negara",
                        btnName: "Update",
                    })
                    @this.set('id', data.id)
                    @this.set('nama', data.nama)
                    @this.set('flag', data.flag)
                }
                $('#formData').modal('show')
            })

            @this.on('close-form', () => {
                @this.set('id', null)
                @this.set('nama', null)
                $('#formData').modal('hide');
            })

            @this.on('show-delete', (data) => {
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        @this.call('destroy', data.id)
                    }
                })
            })
        })
    </script>
@endpush
