<?php

namespace App\Livewire\Admin\ReportRegresi;

use App\Services\RegresiService;
use Livewire\Attributes\On;
use Livewire\Component;

class Kesimpulan extends Component
{
    public $tahunFilter = '2019', $orderBy = 'score';

    public function render(RegresiService $regresiService)
    {
        $service = new $regresiService($this->tahunFilter, $this->orderBy);
        $service->data();
        $service->sum();
        $service->regresi();
        $data = $service->prediction(5);

        $kesimpulan = "Dengan hasil perhitungan regresi linier berganda dari data sebelumnya, dapat disimpulkan bahwa negara yang menduduki peringkat pertama pada tahun " . $this->tahunFilter + 1 . " adalah {$data[0]['nama']}, diikuti oleh {$data[1]['nama']}, {$data[2]['nama']}, {$data[3]['nama']}, dan {$data[4]['nama']}.";

        return view('livewire.admin.report-regresi.kesimpulan', compact('kesimpulan'));
    }

    #[On('change-date')]
    public function changeDate($tahun)
    {
        $this->tahunFilter = $tahun ? $tahun : '2019';
    }
}
