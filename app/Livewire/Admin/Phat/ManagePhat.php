<?php

namespace App\Livewire\Admin\Phat;

use Livewire\Attributes\Title;
use Livewire\Component;
#[Title('Quản lý phạt - Thư viện ITC')]

class ManagePhat extends Component
{
    public function render()
    {
        return view('livewire.admin.phat.manage-phat');
    }
}
