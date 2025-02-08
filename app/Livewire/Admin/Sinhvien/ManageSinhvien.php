<?php

namespace App\Livewire\Admin\Sinhvien;

use Livewire\Attributes\Title;
use Livewire\Component;
#[Title('Quản lý sinh viên - Thư viện ITC')]

class ManageSinhvien extends Component
{
    public function render()
    {
        return view('livewire.admin.sinhvien.manage-sinhvien');
    }
}
