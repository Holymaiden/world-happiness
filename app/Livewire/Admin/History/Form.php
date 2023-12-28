<?php

namespace App\Livewire\Admin\History;

use App\Services\Contracts\HistoryContract;
use App\Services\Contracts\NegaraContract;
use Livewire\Attributes\On;
use Livewire\Component;

class Form extends Component
{
    public $title, $btnName;
    public function render(NegaraContract $negara)
    {
        $title = $this->title;
        $btnName = $this->btnName;

        $negara = $negara->selectNama();

        $years = [];
        for ($i = 2010; $i <= date('Y'); $i++) {
            $years[] = $i;
        }
        return view('livewire.admin.history.form', compact('title', 'btnName', 'negara', 'years'));
    }

    #[On('updateForm')]
    public function updateForm($title, $btnName)
    {
        $this->title = $title;
        $this->btnName = $btnName;
    }

    #[On('showForm')]
    public function showForm(HistoryContract $history, $id)
    {
        if ($id == 0) {
            return $this->dispatch('show-form');
        } else {
            $history = $history->find($id);
            if (!$history) {
                return $this->dispatch('show-message', [
                    'icon' => "error",
                    'title' => "Oops...",
                    'message' => "History tidak ditemukan",
                ]);
            }

            return $this->dispatch('show-form', $history);
        }
    }
}
