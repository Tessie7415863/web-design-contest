<?php

namespace App\Livewire\Admin\Rolehaspermission;

use Livewire\Attributes\Title;
use Livewire\Component;
#[Title('Quản lý rolehaspermission - Thư viện ITC')]

class ManageRolehaspermission extends Component
{
    public function render()
    {
        return view('livewire.admin.rolehaspermission.manage-rolehaspermission');
    }
}
