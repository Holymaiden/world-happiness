@push('style')
    <!-- CSS Libraries -->
@endpush


<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>{{ $title }}</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Laporan</a></div>
                <div class="breadcrumb-item"><a href="{{ route('admin.laporan.regresi') }}">{{ $title }}</a></div>
            </div>
        </div>

        <div class="section-body">
            <livewire:admin.report-regresi.filter />

            <livewire:admin.report-regresi.raw-data />

            <livewire:admin.report-regresi.data />

            <livewire:admin.report-regresi.sum />

            <livewire:admin.report-regresi.regresi />

            <livewire:admin.report-regresi.peramalan />

            <livewire:admin.report-regresi.kesimpulan />
        </div>
    </section>

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
        })
    </script>
@endpush
