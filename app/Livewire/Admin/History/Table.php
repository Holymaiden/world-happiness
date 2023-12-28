<?php

namespace App\Livewire\Admin\History;

use App\Services\Contracts\HistoryContract;
use App\Services\Contracts\NegaraContract;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class Table extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $query = '';
    public $sortField = 'created_at';
    public $sort = 'desc';
    public $perPage = 5;
    public $tahunFilter = '', $negaraFilter = '';
    public $perPageOptions = [5, 10, 15, 25, 50, 100];

    public function render(HistoryContract $history, NegaraContract $negara)
    {
        $data = $history->paginated([
            'query' => $this->query,
            'sort_field' => $this->sortField,
            'sort' => $this->sort,
            'per_page' => $this->perPage,
            'tahun' => $this->tahunFilter,
            'negara' => $this->negaraFilter
        ]);
        $years = $history->getTahun();
        $country = $negara->selectNama();
        return view('livewire.admin.history.table', compact('data', 'years', 'country'));
    }

    public function search()
    {
        $this->resetPage();
    }

    public function changePerPage($perPage)
    {
        $this->perPage = $perPage;
    }

    #[On('reloadTable')]
    public function reloadTable()
    {
        $this->resetPage();
    }

    public function changeDate()
    {
        $this->resetPage();
    }

    public function changeNegara()
    {
        $this->resetPage();
    }
}
