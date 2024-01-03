<?php

namespace App\Livewire\Admin\ReportRegresi;

use App\Services\Contracts\RegresiContract;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    #[Layout('layouts.app')]
    #[Title('Dashboard | Negara')]
    public function render(RegresiContract $regresi)
    {
        $title = 'Report Regresi Linier Berganda';
        return view('livewire.admin.report-regresi.index', compact('title'));
    }
}
