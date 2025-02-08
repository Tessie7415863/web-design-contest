<?php

namespace App\Livewire\Admin\Theloai;

use Livewire\Attributes\Title;
use Livewire\Component;
#[Title('Quản lý thể loại - Thư viện ITC')]

class ManageTheloai extends Component
{
    public function render()
    {
        return view('livewire.admin.theloai.manage-theloai');
    }
}
