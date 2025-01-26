<?php

namespace App\Livewire\Admin\Phieutra;

use App\Models\PhieuMuon;
use App\Models\PhieuTra;
use Livewire\Component;
use Livewire\WithPagination;

class Main extends Component
{
    use WithPagination;
    public $id, $phieu_muon_id, $ngay_tra, $tinh_trang;
    public $deletePhieuTraId;
    public $searchName = '';
    public $isEditMode = false;
    public $isModalOpen = false;
    public $isConfirmModalOpen = false;

    public function render()
    {
        $phieutras = PhieuTra::paginate(10);
        $phieumuons = PhieuMuon::all();
        return view('livewire.admin.phieutra.main', compact('phieumuons'));
    }
}
