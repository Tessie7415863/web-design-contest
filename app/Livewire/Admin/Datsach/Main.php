<?php

namespace App\Livewire\Admin\Datsach;

use App\Models\CuonSach;
use App\Models\DatSach;
use App\Models\SinhVien;
use Flasher\Prime\FlasherInterface;
use Livewire\Component;
use Livewire\WithPagination;

class Main extends Component
{
    use WithPagination;
    public $id, $sinh_vien_id, $cuon_sach_id, $ngay_dat, $tinh_trang;

    public $deleteDatSachId;
    public $searchName = '';
    public $isEditMode = false;
    public $isModalOpen = false;
    public $isConfirmModalOpen = false;
    public function render()
    {
        $datsachs = DatSach::paginate(10);
        $sinhviens = SinhVien::all();
        $cuonsachs = CuonSach::all();
        return view('livewire.admin.datsach.main', compact('datsachs', 'sinhviens', 'cuonsachs'));
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
        $this->deleteDatSachId = $id;
        $this->isConfirmModalOpen = true;
    }
    public function closeConfirmModal()
    {
        $this->deleteDatSachId = null;
        $this->isConfirmModalOpen = false;
    }
    public function resetForm()
    {
        $this->ten_nganh = null;
        $this->khoa_id = null;
        $this->isEditMode = false;
    }

    public function createDatSach(FlasherInterface $flasher)
    {
        $this->validate([
            'sinh_vien_id' => 'required',
            'cuon_sach_id' => 'required',
            'ngay_dat' => 'required',
            'tinh_trang' => 'required|in:DangDat,DaNhan,Huy',
        ]);

        DatSach::create([
            'sinh_vien_id' => $this->sinh_vien_id,
            'cuon_sach_id' => $this->cuon_sach_id,
            'ngay_dat' => $this->ngay_dat,
            'tinh_trang' => $this->tinh_trang,
        ]);
        $flasher->addSuccess('Tạo đặt sách thành công!');

        $this->closeModal();
        $this->resetForm();
    }

    public function editDatSach($id)
    {

        $datsach = DatSach::findOrFail($id);
        $this->id = $datsach->id;
        $this->sinh_vien_id = $datsach->sinh_vien_id;
        $this->cuon_sach_id = $datsach->cuon_sach_id;
        $this->ngay_dat = $datsach->ngay_dat;
        $this->tinh_trang = $datsach->tinh_trang;

        $this->isEditMode = true;
        $this->openModal();
    }

    public function updateDatSach(FlasherInterface $flasher)
    {
        $this->validate([
            'sinh_vien_id' => 'required',
            'cuon_sach_id' => 'required',
            'ngay_dat' => 'required',
            'tinh_trang' => 'required|in:DangDat,DaNhan,Huy',
        ]);
        $datsach = DatSach::findOrFail($this->id);
        $datsach->update([
            'sinh_vien_id' => $this->sinh_vien_id,
            'cuon_sach_id' => $this->cuon_sach_id,
            'ngay_dat' => $this->ngay_dat,
            'tinh_trang' => $this->tinh_trang,
        ]);
        $flasher->addSuccess('Cập nhật đặt sách thành công!');
        $this->closeModal();
        $this->resetForm();
    }

    public function deleteDatSach(FlasherInterface $flasher)
    {
        if ($this->deleteDatSachId) {
            DatSach::findOrFail($this->deleteDatSachId)->delete();
            $this->closeConfirmModal();
            $flasher->addSuccess('Xoá đặt sách thành công!');
        }
    }
}
