<?php

namespace App\Livewire\Admin\Negara;

use App\Services\Contracts\NegaraContract;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Component;

class Index extends Component
{
    public $id = 0, $nama = '';

    #[Layout('layouts.app')]
    #[Title('Dashboard | Negara')]
    public function render()
    {
        $title = "Negara";
        return view('livewire.admin.negara.index', compact('title'));
    }

    public function submitForm(NegaraContract $negara)
    {
        $this->validate([
            'nama' => 'required',
        ]);

        if ($this->id == 0) {
            try {
                $negara->store(['nama' => $this->nama]);

                $this->dispatch('show-message', [
                    'icon' => "success",
                    'title' => "Berhasil",
                    'message' => "Created Successfully",
                ]);
            } catch (\Exception $e) {
                $this->dispatch('show-message', [
                    'icon' => "error",
                    'title' => "Oops...",
                    'message' => $e->getMessage(),
                ]);
            }
        } else {
            try {
                $negara->update(['nama' => $this->nama], $this->id);

                $this->dispatch('show-message', [
                    'icon' => "success",
                    'title' => "Berhasil",
                    'message' => "Updated Successfully",
                ]);
            } catch (\Exception $e) {
                $this->dispatch('show-message', [
                    'icon' => "error",
                    'title' => "Oops...",
                    'message' => $e->getMessage(),
                ]);
            }
        }

        $this->dispatch('reloadTable');
        $this->dispatch('close-form');
    }

    public function destroy(NegaraContract $negara, $id)
    {
        try {
            $negara->delete($id);

            $this->dispatch('show-message', [
                'icon' => "success",
                'title' => "Berhasil",
                'message' => "Deleted Successfully",
            ]);

            $this->dispatch('reloadTable');
        } catch (\Exception $e) {
            $this->dispatch('show-message', [
                'icon' => "error",
                'title' => "Oops...",
                'message' => $e->getMessage(),
            ]);
        }
    }
}
