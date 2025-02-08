<?php

namespace App\Livewire\Admin\Phieumuon;

use Livewire\Attributes\Title;
use Livewire\Component;
#[Title('Quản lý phiếu mượn - Thư viện ITC')]

class ManagePhieumuon extends Component
{
    public function render()
    {
        return view('livewire.admin.phieumuon.manage-phieumuon');
    }
}
