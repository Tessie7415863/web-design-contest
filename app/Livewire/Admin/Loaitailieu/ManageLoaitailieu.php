<?php

namespace App\Livewire\Admin\Loaitailieu;

use Livewire\Attributes\Title;
use Livewire\Component;
#[Title('Quản lý loại tài liệu - Thư viện ITC')]

class ManageLoaitailieu extends Component
{
    public function render()
    {
        return view('livewire.admin.loaitailieu.manage-loaitailieu');
    }
}
