<?php

namespace App\Livewire\Admin\User;

use Livewire\Attributes\Title;
use Livewire\Component;
#[Title('Quản lý user - Thư viện ITC')]

class ManageUser extends Component
{
    public function render()
    {
        return view('livewire.admin.user.manage-user');
    }
}
