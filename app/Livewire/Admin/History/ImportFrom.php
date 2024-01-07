<?php

namespace App\Livewire\Admin\History;

use App\Imports\HistoryImport;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;
use Maatwebsite\Excel\Facades\Excel as MattExcel;

class ImportFrom extends Component
{
    use WithFileUploads;

    #[Rule('required|file|mimes:xls,xlsx')]
    public $form;

    public function render()
    {
        return view('livewire.admin.history.import-from');
    }

    public function import()
    {
        if (!$this->form)
            $this->dispatch('show-message', [
                'icon' => "success",
                'title' => "Berhasil",
                'message' => "Data Tidak Boleh Kosong",
            ]);

        $data = $this->form->store('forms');

        try {
            MattExcel::import(new HistoryImport(), storage_path('app/' . $data));

            $this->dispatch('show-message', [
                'icon' => "success",
                'title' => "Berhasil",
                'message' => "Data Berhasil",
            ]);
            $this->dispatch('close-form-import');
        } catch (\Exception $e) {
            $this->dispatch('show-message', [
                'icon' => "error",
                'title' => "Gagal",
                'message' => $e->getMessage(),
            ]);
        }
    }
}
