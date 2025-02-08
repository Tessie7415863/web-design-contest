<?php

namespace App\Livewire\Admin\Roles;

use Livewire\Attributes\Title;
use Livewire\Component;
#[Title('Quản lý roles - Thư viện ITC')]

class ManageRoles extends Component
{
    public function render()
    {
        return view('livewire.admin.roles.manage-roles');
    }
}
