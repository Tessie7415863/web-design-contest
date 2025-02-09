<?php

namespace App\Livewire\Client\Components;

use App\Models\CuonSach;
use App\Models\DatSach;
use App\Models\PhieuMuon;
use App\Models\Sach;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class LichSuMuon extends Component
{
    public $sinh_vien_id;
    public $datSachs; // Danh sách đặt sách của sinh viên

    public function mount()
    {
        $sinhVien = Auth::guard('sinhvien')->user();
        $this->sinh_vien_id = $sinhVien->id;

        // Lấy tất cả các bản ghi đặt sách của sinh viên với quan hệ: cuonSach và sach
        $this->datSachs = DatSach::with('cuonSach.sach')
            ->where('sinh_vien_id', $this->sinh_vien_id)
            ->get();
    }

    public function render()
    {
        // Tính tổng số sách đã đặt/mượn
        $tong_sach = $this->datSachs->count();
        return view('livewire.client.components.lich-su-muon', compact('tong_sach'));
    }
}
