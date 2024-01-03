<?php

namespace App\Livewire\Admin\ReportRegresi;

use App\Services\RegresiService;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class Peramalan extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $tahunFilter = '2019', $orderBy = 'score';
    public $perPage = 5;
    public $perPageOptions = [5, 10, 15, 25, 50, 100];

    public function render(RegresiService $regresiService)
    {
        $service = new $regresiService($this->tahunFilter, $this->orderBy);
        $service->data();
        $service->sum();
        $service->regresi();
        $data = $service->prediction($this->perPage);
        return view('livewire.admin.report-regresi.peramalan', compact('data'));
    }


    public function changePerPage($perPage)
    {
        $this->perPage = $perPage;
    }

    #[On('change-date')]
    public function changeDate($tahun)
    {
        $this->tahunFilter = $tahun ? $tahun : '2019';
    }
}
