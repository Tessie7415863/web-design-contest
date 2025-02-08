<?php

namespace App\Livewire\Admin\Lienketsachnganh;

use Livewire\Attributes\Title;
use Livewire\Component;
#[Title('Quản lý liên kết sách ngành - Thư viện ITC')]

class ManageLienketsachnganh extends Component
{
    public function render()
    {
        return view('livewire.admin.lienketsachnganh.manage-lienketsachnganh');
    }
}
