<?php

namespace App\Livewire\Client\Components;

use App\Models\PhieuMuon;
use Carbon\Carbon;
use Livewire\Component;

class LichSuMuon extends Component
{
    public ?int $sinh_vien_id = null;
    public ?string $ngay = null; // Ngày mượn sách

    public function mount($sinh_vien_id = null, $ngay = null)
    {
        $this->sinh_vien_id = $sinh_vien_id;
        $this->ngay = $ngay ?? Carbon::today()->toDateString(); // Mặc định là ngày hôm nay
    }


    public function render()
    {
        if (!$this->sinh_vien_id) {
            return "<div class='text-red-500 font-bold'>Không tìm thấy dữ liệu sinh viên.</div>";
        }

        // Lấy danh sách phiếu mượn trong ngày được chọn
        $phieumuons = PhieuMuon::where('sinh_vien_id', $this->sinh_vien_id)
            ->whereDate('ngay_muon', $this->ngay)
            ->with('sach')
            ->get();
        // Tính tổng số sách đã mượn trong ngày
        $tong_sach = $phieumuons->sum('so_luong');

        return view('livewire.client.components.lich-su-muon', compact('phieumuons', 'tong_sach'));
    }
}