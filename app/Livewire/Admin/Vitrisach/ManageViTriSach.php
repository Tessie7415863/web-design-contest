<?php

namespace App\Livewire\Admin\Vitrisach;

use Livewire\Attributes\Title;
use Livewire\Component;
#[Title('Quản lý vị trí sách - Thư viện ITC')]

class ManageVitrisach extends Component
{
    public function render()
    {
        return view('livewire.admin.vitrisach.manage-vitrisach');
    }
}
