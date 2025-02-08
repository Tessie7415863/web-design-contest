<?php

namespace App\Livewire\Client\Components;

use App\Models\DeXuat;
use Flasher\Prime\FlasherInterface;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class DeXuatSachTaiLieu extends Component
{
    public $tieu_de;
    public $loai = 'sach';
    public $mo_ta;
    protected $rules = [
        'tieu_de' => 'required|string|max:255',
        'loai'     => 'required|in:sach,tai_lieu',
        'mo_ta'    => 'nullable|string',
    ];
    public function submitProposal(FlasherInterface $flasher)
    {
        $this->validate();
        $sinhVien = Auth::guard('sinhvien')->user();
        // Tạo đề xuất mới
        DeXuat::create([
            'sinh_vien_id'    => $sinhVien->id,
            'tieu_de'    => $this->tieu_de,
            'loai'       => $this->loai,
            'mo_ta'      => $this->mo_ta,
            'trang_thai' => 'ChuaXuLy',
        ]);

        $flasher->addSuccess('Thông báo', 'Đề xuất của bạn đã được gửi thành công!');
        $this->reset(['tieu_de', 'loai', 'mo_ta']);
    }
    public function render()
    {
        return view('livewire.client.components.de-xuat-sach-tai-lieu');
    }
}