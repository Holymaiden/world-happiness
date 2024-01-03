<?php

namespace App\Livewire\Home\Landing;

use App\Services\Contracts\HistoryContract;
use App\Services\Contracts\NegaraContract;
use App\Services\RegresiService;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class Index extends Component
{
    public $tahunFilter = 2019;
    public $orderBy = 'score';
    public $perPage = 5;

    #[Layout('layouts.home')]
    #[Title('Happiness')]
    public function render(RegresiService $regresiService, NegaraContract $negaraService, HistoryContract $historyContract)
    {
        $tahun = $this->tahunFilter;

        $service = new $regresiService($tahun, $this->orderBy);
        $service->data();
        $service->sum();
        $service->regresi();
        $data = $service->prediction($this->perPage);
        $statistic = $service->getStatistic();

        $negaraCount = $negaraService->getCount();

        $ekonomiSum = $historyContract->getSum('ekonomi', $tahun);
        $kesehatanSum = $historyContract->getSum('kesehatan', $tahun);
        $kebebasanSum = $historyContract->getSum('kebebasan', $tahun);

        return view('livewire.home.landing.index', compact('data', 'negaraCount', 'ekonomiSum', 'kesehatanSum', 'kebebasanSum', 'tahun', 'statistic'));
    }

    public function more()
    {
        $this->perPage = $this->perPage + 5;
    }
}
