<?php

namespace App\Livewire\Admin\Hoadonphat;

use Livewire\Attributes\Title;
use Livewire\Component;
#[Title('Quản lý hóa đơn phạt - Thư viện ITC')]

class ManageHoadonphat extends Component
{
    public function render()
    {
        return view('livewire.admin.hoadonphat.manage-hoadonphat');
    }
}
