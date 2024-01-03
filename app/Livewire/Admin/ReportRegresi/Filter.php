<?php

namespace App\Livewire\Admin\ReportRegresi;

use App\Services\Contracts\HistoryContract;
use Livewire\Component;

class Filter extends Component
{
    public function render(HistoryContract $history)
    {
        $years = $history->getTahun();
        return view('livewire.admin.report-regresi.filter', compact('years'));
    }

    public function changeDate($value)
    {
        $this->dispatch('change-date', $value);
    }
}
