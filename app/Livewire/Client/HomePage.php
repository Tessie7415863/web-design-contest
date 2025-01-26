<?php

namespace App\Livewire\Client;

use App\Models\Khoa;
use App\Models\MonHoc;
use App\Models\Nganh;
use App\Models\NhaXuatBan;
use App\Models\Sach;
use App\Models\TacGia;
use App\Models\TheLoai;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class HomePage extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.client.home-page');
    }
}
