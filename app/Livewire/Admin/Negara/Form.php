<?php

namespace App\Livewire\Admin\Negara;

use App\Services\Contracts\NegaraContract;
use Livewire\Attributes\On;
use Livewire\Component;

class Form extends Component
{
    public $title, $btnName;
    public function render()
    {
        $title = $this->title;
        $btnName = $this->btnName;
        return view('livewire.admin.negara.form', compact('title', 'btnName'));
    }

    #[On('updateForm')]
    public function updateForm($title, $btnName)
    {
        $this->title = $title;
        $this->btnName = $btnName;
    }

    #[On('showForm')]
    public function showForm(NegaraContract $negara, $id)
    {
        if ($id == 0) {
            return $this->dispatch('show-form');
        } else {
            $negara = $negara->find($id);
            if (!$negara) {
                return $this->dispatch('show-message', [
                    'icon' => "error",
                    'title' => "Oops...",
                    'message' => "Negara tidak ditemukan",
                ]);
            }

            return $this->dispatch('show-form', $negara);
        }
    }
}
