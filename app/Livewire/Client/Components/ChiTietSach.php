<?php

namespace App\Livewire\Client\Components;

use App\Models\CuonSach;
use App\Models\Sach;
use Flasher\Prime\FlasherInterface;
use Livewire\Component;

class ChiTietSach extends Component
{
    public $sach;
    public $selectedSachDetails = null;
    public function mount($id)
    {
        $this->selectedSachDetails = CuonSach::where('sach_id', $id)->first();
        $this->sach = Sach::with(['tacGia', 'theLoai', 'nhaXuatBan', 'mon', 'nganh', 'khoa'])
            ->findOrFail($id);
    }
    public function alert(FlasherInterface $flasher)
    {
        $flasher->addError('Thông báo', 'Bạn phải đăng nhập để mượn sách');
    }
    public function borrowSach($id)
    {
        return redirect()->route('borrow', ['id' => $id]);
    }
    public function render()
    {
        return view('livewire.client.components.chi-tiet-sach', ['sach' => $this->sach]);
    }
}
