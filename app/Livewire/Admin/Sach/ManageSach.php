<?php

namespace App\Livewire\Admin\Sach;

use Livewire\Attributes\Title;
use Livewire\Component;
#[Title('Quản lý sách - Thư viện ITC')]

class ManageSach extends Component
{
    public function render()
    {
        return view('livewire.admin.sach.manage-sach');
    }
}
