<?php

namespace App\Livewire\Admin\Permissions;

use Livewire\Attributes\Title;
use Livewire\Component;
#[Title('Quản lý permissions - Thư viện ITC')]

class ManagePermissions extends Component
{
    public function render()
    {
        return view('livewire.admin.permissions.manage-permissions');
    }
}
