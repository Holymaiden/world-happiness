<?php

namespace App\Livewire\Admin\ReportRegresi;

use App\Services\RegresiService;
use Livewire\Attributes\On;
use Livewire\Component;

class Sum extends Component
{
    public $tahunFilter = '2019', $orderBy = 'score';

    public function render(RegresiService $regresiService)
    {
        $service = new $regresiService($this->tahunFilter, $this->orderBy);
        $service->data();
        $data = $service->sum();
        return view('livewire.admin.report-regresi.sum', compact('data'));
    }

    #[On('change-date')]
    public function changeDate($tahun)
    {
        $this->tahunFilter = $tahun ? $tahun : '2019';
    }
}
