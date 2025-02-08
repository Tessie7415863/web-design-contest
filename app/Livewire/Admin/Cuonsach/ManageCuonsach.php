<?php

namespace App\Livewire\Admin\Cuonsach;

use Livewire\Attributes\Title;
use Livewire\Component;
#[Title('Quản lý cuốn sách - Thư viện ITC')]


class ManageCuonsach extends Component
{
    public function render()
    {
        return view('livewire.admin.cuonsach.manage-cuonsach');
    }
}
