<?php

namespace App\Livewire\Client\Components;

use App\Mail\BorrowBookMail;
use App\Models\CuonSach;
use App\Models\DatSach;
use App\Models\PhieuMuon;
use App\Models\Sach;
use App\Models\SinhVien;
use Carbon\Carbon;
use Flasher\Prime\FlasherInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
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
        $cuonSach = CuonSach::where('sach_id', $this->sach->id)
            ->where('tinh_trang', 'Con')
            ->first();

        if (!$cuonSach) {
            $flasher->addError('error', 'Hiện tại không có cuốn sách nào sẵn sàng để mượn.');
            return;
        }

        // Kiểm tra ngày hẹn trả phải sau ngày mượn
        if (strtotime($this->ngay_hen_tra) <= strtotime($this->ngay_muon)) {
            $flasher->addError('error', 'Ngày hẹn trả phải sau ngày mượn.');
            return;
        }

        // Sử dụng Carbon để tính khoảng cách ngày, nếu vượt quá 30 ngày thì báo lỗi
        $ngayMuon = Carbon::parse($this->ngay_muon);
        $ngayHenTra = Carbon::parse($this->ngay_hen_tra);
        if ($ngayMuon->diffInDays($ngayHenTra) > 30) {
            $flasher->addError('error', 'Thời gian mượn không được vượt quá 30 ngày.');
            return;
        }

        $sinhVien = Auth::guard('sinhvien')->user();
        $phieuMuon = PhieuMuon::create([
            'sinh_vien_id' => $sinhVien->id,
            'nhan_vien_id' => null,
            'ngay_muon' => $this->ngay_muon,
            'ngay_hen_tra' => $this->ngay_hen_tra,
            'tinh_trang' => 'DangMuon',
            'email_log_url' => null
        ]);
        $datSach = DatSach::create([
            'sinh_vien_id' => $sinhVien->id,
            'cuon_sach_id' => $cuonSach->id,
            'ngay_dat' => now(),
            'tinh_trang' => 'DangDat',
        ]);
        $cuonSach->update(['tinh_trang' => 'Muon']);

        Mail::to($sinhVien->email)->queue(new BorrowBookMail($this->sach, $cuonSach, $phieuMuon));

        $this->ngay_muon = null;
        $this->ngay_hen_tra = null;

        $flasher->addSuccess('success', 'Mượn sách thành công! Thông tin mượn được gửi tới email của bạn!');
    }


    public function render()
    {
        return view('livewire.client.components.borrow', [
            'sach' => $this->sach,
        ]);
    }
}
