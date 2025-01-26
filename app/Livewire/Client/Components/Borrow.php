<?php

namespace App\Livewire\Client\Components;

use App\Models\CuonSach;
use App\Models\PhieuMuon;
use App\Models\Sach;
use App\Models\SinhVien;
use Flasher\Prime\FlasherInterface;
use Livewire\Component;

class Borrow extends Component
{
    public $sach;
    public $ngay_muon;
    public $ngay_hen_tra;

    public function mount($id)
    {
        $this->sach = Sach::findOrFail($id); // Lấy thông tin sách
    }

    public function borrowBook(FlasherInterface $flasher)
    {
        // Kiểm tra sách có còn sẵn sàng cho mượn không
        $cuonSach = CuonSach::where('sach_id', $this->sach->id)
            ->where('tinh_trang', 'Con')
            ->first();

        if (!$cuonSach) {
            $flasher->addError('error', 'Hiện tại không có cuốn sách nào sẵn sàng để mượn.');
            return;
        }
        $sinhVien = SinhVien::where('user_id', auth()->user()->id)->first();

        if (!$sinhVien) {
            // Xử lý khi không tìm thấy sinh viên
            throw new \Exception('Không tìm thấy sinh viên với user_id này.');
        }

        $phieuMuon = PhieuMuon::create([
            'sinh_vien_id' => $sinhVien->id, // ID của sinh viên
            'nhan_vien_id' => null, // Cán bộ xử lý (sau này có thể cập nhật)
            'ngay_muon' => $this->ngay_muon,
            'ngay_hen_tra' => $this->ngay_hen_tra,
            'tinh_trang' => 'DangMuon',
        ]);

        // Cập nhật tình trạng của cuốn sách
        $cuonSach->update(['tinh_trang' => 'Muon']);

        $flasher->addSuccess('success', 'Mượn sách thành công!');
    }

    public function render()
    {
        return view('livewire.client.components.borrow', [
            'sach' => $this->sach,
        ]);
    }
}
