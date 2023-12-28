<?php

namespace App\Livewire\Admin\Negara;

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
    public $perPageOptions = [5, 10, 15, 25, 50, 100];

    public function render(NegaraContract $negara)
    {
        $data = $negara->paginated([
            'query' => $this->query,
            'sort_field' => $this->sortField,
            'sort' => $this->sort,
            'per_page' => $this->perPage,
        ]);
        return view('livewire.admin.negara.table', compact('data'));
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
}
