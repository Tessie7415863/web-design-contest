<?php

namespace App\Livewire\Admin\Datsach;

use Livewire\Attributes\Title;
use Livewire\Component;
#[Title('Quản lý đặt sách - Thư viện ITC')]


class ManageDatsach extends Component
{
    public function render()
    {
        return view('livewire.admin.datsach.manage-datsach');
    }
}
