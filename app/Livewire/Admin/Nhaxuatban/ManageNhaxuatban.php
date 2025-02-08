<?php

namespace App\Livewire\Admin\Nhaxuatban;

use Livewire\Attributes\Title;
use Livewire\Component;
#[Title('Quản lý nhà xuất bản - Thư viện ITC')]

class ManageNhaxuatban extends Component
{
    public function render()
    {
        return view('livewire.admin.nhaxuatban.manage-nhaxuatban');
    }
}
