<?php

namespace App\Livewire\Admin\History;

use App\Services\Contracts\HistoryContract;
use App\Services\Contracts\NegaraContract;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class Index extends Component
{
    public $id = 0, $negara_id, $tahun, $ekonomi, $kesehatan, $kebebasan, $score;

    #[Layout('layouts.app')]
    #[Title('Dashboard | History')]
    public function render()
    {
        $title = "History";

        return view('livewire.admin.history.index', compact('title'));
    }

    public function submitForm(HistoryContract $history)
    {
        $this->validate([
            'tahun' => 'required',
            'ekonomi' => 'required',
            'kesehatan' => 'required',
            'kebebasan' => 'required',
            'score' => 'required',
        ]);

        if ($this->id == 0) {
            try {
                $history->store([
                    'negara_id' => $this->negara_id,
                    'tahun' => $this->tahun,
                    'ekonomi' => $this->ekonomi,
                    'kesehatan' => $this->kesehatan,
                    'kebebasan' => $this->kebebasan,
                    'score' => $this->score,
                ]);

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
                $history->update([
                    'negara_id' => $this->negara_id,
                    'tahun' => $this->tahun,
                    'ekonomi' => $this->ekonomi,
                    'kesehatan' => $this->kesehatan,
                    'kebebasan' => $this->kebebasan,
                    'score' => $this->score,
                ], $this->id);

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

    public function destroy(HistoryContract $history, $id)
    {
        try {
            $history->delete($id);

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
