<?php

namespace App\Livewire\Admin\Tailieumo;

use Livewire\Attributes\Title;
use Livewire\Component;
#[Title('Quản lý tài liệu mở - Thư viện ITC')]

class ManageTailieumo extends Component
{
    public function render()
    {
        return view('livewire.admin.tailieumo.manage-tailieumo');
    }
}
