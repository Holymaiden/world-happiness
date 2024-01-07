@push('style')
    <!-- CSS Libraries -->
@endpush


<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>{{ $title }}</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Master Data</a></div>
                <div class="breadcrumb-item"><a href="{{ route('admin.history') }}">{{ $title }}</a></div>
            </div>
        </div>

        <div class="section-body">
            <livewire:admin.history.table />
        </div>
    </section>
    <livewire:admin.history.form />
    <livewire:admin.history.import-from />
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

            const resetForm = () => {
                @this.set('id', null)
                @this.set('negara_id', null)
                @this.set('tahun', null)
                @this.set('ekonomi', null)
                @this.set('kesehatan', null)
                @this.set('kebebasan', null)
            }

            @this.on('show-form', (data) => {
                resetForm();

                if (data.length === 0) {
                    @this.dispatch('updateForm', {
                        title: "Create History",
                        btnName: "Save",
                    })
                } else {
                    data = data[0];
                    @this.dispatch('updateForm', {
                        title: "Update History",
                        btnName: "Update",
                    })
                    @this.set('id', data.id)
                    @this.set('negara_id', data.negara_id)
                    @this.set('tahun', data.tahun)
                    @this.set('ekonomi', data.ekonomi)
                    @this.set('kesehatan', data.kesehatan)
                    @this.set('kebebasan', data.kebebasan)
                }
                $('#formData').modal('show')
            })

            @this.on('close-form', () => {
                resetForm();
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

            @this.on('show-form-import', (data) => {
                $('#formImport').modal('show')
            })

            @this.on('close-form-import', () => {
                $('#formImport').modal('hide')
            })
        })
    </script>
@endpush
