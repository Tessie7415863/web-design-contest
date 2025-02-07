<?php

namespace App\Livewire\Admin\Phieumuon;

use App\Models\NhanVien;
use App\Models\PhieuMuon;
use App\Models\SinhVien;
use Flasher\Prime\FlasherInterface;
use Livewire\Component;
use Livewire\WithPagination;

class Main extends Component
{
    use WithPagination;
    public $id, $sinh_vien_id, $nhan_vien_id, $ngay_muon, $ngay_hen_tra, $ngay_tra, $tinh_trang;

    public $deletePhieuMuonId;
    public $searchName = '';
    public $isEditMode = false;
    public $isModalOpen = false;
    public $isConfirmModalOpen = false;
    public function render()
    {
        $phieumuons = PhieuMuon::with('sinhvien')
            ->whereHas('sinhvien', function ($query) {
                $query->where('ho_ten', 'like', '%' . $this->searchName . '%');
            })
            ->orWhere('id', $this->searchName)
            ->paginate(10);

        $sinhviens = SinhVien::all();
        $nhanviens = NhanVien::all();

        return view('livewire.admin.phieumuon.main', compact('phieumuons', 'sinhviens', 'nhanviens'));
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
        $this->deletePhieuMuonId = $id;
        $this->isConfirmModalOpen = true;
    }
    public function closeConfirmModal()
    {
        $this->deletePhieuMuonId = null;
        $this->isConfirmModalOpen = false;
    }
    public function resetForm()
    {
        $this->sinh_vien_id = null;
        $this->nhan_vien_id = null;
        $this->ngay_muon = null;
        $this->ngay_hen_tra = null;
        $this->ngay_tra = null;
        $this->tinh_trang = null;
        $this->isEditMode = false;
    }

    public function createPhieuMuon(FlasherInterface $flasher)
    {
        $this->validate([
            'sinh_vien_id' => 'required',
            'nhan_vien_id' => 'required',
            'ngay_muon' => 'required',
            'ngay_hen_tra' => 'required',
            'ngay_tra' => 'required',
            'tinh_trang' => 'required',
        ]);

        $exists = PhieuMuon::where('sinh_vien_id', $this->sinh_vien_id)->exists();
        if ($exists) {
            // Thêm thông báo lỗi
            $flasher->addError('Phiếu mượn đã tồn tại.');
            return;
        }
        PhieuMuon::create([
            'sinh_vien_id' => $this->sinh_vien_id,
            'nhan_vien_id' => $this->nhan_vien_id,
            'ngay_muon' => $this->ngay_muon,
            'ngay_hen_tra' => $this->ngay_hen_tra,
            'ngay_tra' => $this->ngay_tra,
            'tinh_trang' => $this->tinh_trang,
        ]);
        $flasher->addSuccess('Tạo môn thành công!');

        $this->closeModal();
        $this->resetForm();
    }

    public function editPhieuMuon($id)
    {

        $phieumuon = PhieuMuon::findOrFail($id);
        $this->id = $phieumuon->id;
        $this->sinh_vien_id = $phieumuon->sinh_vien_id;
        $this->nhan_vien_id = $phieumuon->nhan_vien_id;
        $this->ngay_muon = $phieumuon->ngay_muon;
        $this->ngay_hen_tra = $phieumuon->ngay_hen_tra;
        $this->ngay_tra = $phieumuon->ngay_tra;
        $this->tinh_trang = $phieumuon->tinh_trang;
        $this->isEditMode = true;
        $this->openModal();
    }

    public function updatePhieuMuon(FlasherInterface $flasher)
    {
        $this->validate([
            'sinh_vien_id' => 'required',
            'nhan_vien_id' => 'required',
            'ngay_muon' => 'required',
            'ngay_hen_tra' => 'required',
            'ngay_tra' => 'required',
            'tinh_trang' => 'required',
        ]);
        $phieumuon = PhieuMuon::findOrFail($this->id);
        $phieumuon->update([
            'sinh_vien_id' => $this->sinh_vien_id,
            'nhan_vien_id' => $this->nhan_vien_id,
            'ngay_muon' => $this->ngay_muon,
            'ngay_hen_tra' => $this->ngay_hen_tra,
            'ngay_tra' => $this->ngay_tra,
            'tinh_trang' => $this->tinh_trang,
        ]);
        $flasher->addSuccess('Cập nhật phiếu mượn thành công!');
        $this->closeModal();
        $this->resetForm();
    }

    public function deletePhieuMuon(FlasherInterface $flasher)
    {
        if ($this->deletePhieuMuonId) {
            PhieuMuon::findOrFail($this->deletePhieuMuonId)->delete();
            $this->closeConfirmModal();
            $flasher->addSuccess('Xoá phiếu mượn thành công!');
        }
    }
}
