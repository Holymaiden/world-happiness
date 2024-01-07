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

        // Get flash from node_module flag-icon-css svg
        $flags = [
            'af', // Afghanistan
            'am', // Armenia
            'az', // Azerbaijan
            'bh', // Bahrain
            'bd', // Bangladesh
            'bt', // Bhutan
            'bn', // Brunei Darussalam
            'kh', // Cambodia
            'cn', // China
            'cy', // Cyprus
            'ge', // Georgia
            'in', // India
            'id', // Indonesia
            'ir', // Iran
            'iq', // Iraq
            'il', // Israel
            'jp', // Japan
            'jo', // Jordan
            'kz', // Kazakhstan
            'kw', // Kuwait
            'kg', // Kyrgyzstan
            'la', // Laos
            'lb', // Lebanon
            'my', // Malaysia
            'mv', // Maldives
            'mn', // Mongolia
            'mm', // Myanmar (Burma)
            'np', // Nepal
            'kp', // North Korea
            'om', // Oman
            'pk', // Pakistan
            'ps', // Palestine
            'ph', // Philippines
            'qa', // Qatar
            'sa', // Saudi Arabia
            'sg', // Singapore
            'kr', // South Korea
            'lk', // Sri Lanka
            'sy', // Syria
            'tw', // Taiwan
            'tj', // Tajikistan
            'th', // Thailand
            'tl', // Timor-Leste
            'tr', // Turkey
            'tm', // Turkmenistan
            'ae', // United Arab Emirates
            'uz', // Uzbekistan
            'vn', // Vietnam
            'ye'  // Yemen
        ];

        return view('livewire.admin.negara.form', compact('title', 'btnName', 'flags'));
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
