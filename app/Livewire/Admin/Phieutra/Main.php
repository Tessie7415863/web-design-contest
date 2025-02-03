<?php

namespace App\Livewire\Admin\Phieutra;

use App\Models\PhieuMuon;
use App\Models\PhieuTra;
use Flasher\Prime\FlasherInterface;
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
        return view('livewire.admin.phieutra.main', compact('phieumuons', 'phieutras'));
    }

    public function openModal()
    {
        $this->isModalOpen = true;
    }

    public function closeModal()
    {
        $this->resetForm();
        $this->isModalOpen = false;
    }

    public function openConfirmModal($id)
    {
        $this->deletePhieuTra = $id;
        $this->isConfirmModalOpen = true;
    }
    public function closeConfirmModal()
    {
        $this->deletePhieuTra = null;
        $this->isConfirmModalOpen = false;
    }
    public function resetForm()
    {
        $this->phieu_muon_id = null;
        $this->ngay_tra = null;
        $this->tinh_trang = null;
        $this->isEditMode = false;
    }

    public function createPhieuTra(FlasherInterface $flasher)
    {
        $this->validate([
            'phieu_muon_id' => 'required|exists:phieu_muons,id',
            'ngay_tra' => 'required',
            'tinh_trang' => 'required',
        ]);

        PhieuTra::create([
            'phieu_muon_id' => $this->phieu_muon_id,
            'ngay_tra' => $this->ngay_tra,
            'tinh_trang' => $this->tinh_trang,
        ]);
        $flasher->addSuccess('Tạo phiếu trả thành công!');
        $this->closeModal();
        $this->resetForm();
    }

    public function editPhieuTra($id)
    {

        $phieutra = PhieuTra::findOrFail($id);
        $this->id = $phieutra->id;
        $this->phieu_muon_id = $phieutra->phieu_muon_id;
        $this->ngay_tra = $phieutra->ngay_tra;
        $this->tinh_trang = $phieutra->tinh_trang;
        $this->isEditMode = true;
        $this->openModal();
    }

    public function updatePhieuTra(FlasherInterface $flasher)
    {
        $this->validate([
            'phieu_muon_id' => 'required|exists:phieu_muons,id',
            'ngay_tra' => 'required',
            'tinh_trang' => 'required',
        ]);
        $phieutra = PhieuTra::findOrFail($this->id);
        $phieutra->update([
            'phieu_muon_id' => $this->phieu_muon_id,
            'ngay_tra' => $this->ngay_tra,
            'tinh_trang' => $this->tinh_trang,
        ]);
        $flasher->addSuccess('Cập nhật phiếu trả thành công!');
        $this->closeModal();
        $this->resetForm();
    }

    public function deletePhieuTra(FlasherInterface $flasher)
    {
        if ($this->deletePhieuTra) {
            PhieuTra::findOrFail($this->deletePhieuTra)->delete();
            $this->closeConfirmModal();
            $flasher->addSuccess('Xoá phiếu trả thành công!');
        }
    }
}
