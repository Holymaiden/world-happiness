<?php

namespace App\Livewire\Admin\Dashboard;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class Index extends Component
{
    #[Layout('layouts.app')]
    #[Title('Dashboard')]
    public function render()
    {
        return view('livewire.admin.dashboard.index');
    }
}
