<?php

namespace App\Livewire\Admin\Monhoc;

use App\Models\MonHoc;
use App\Models\Nganh;
use Flasher\Prime\FlasherInterface;
use Livewire\Component;
use Livewire\WithPagination;

class Main extends Component
{
    use WithPagination;
    public $id, $ten_mon, $nganh_id;

    public $deleteMonHocId;
    public $searchName = '';
    public $isEditMode = false;
    public $isModalOpen = false;
    public $isConfirmModalOpen = false;

    public function render()
    {
        $monhocs = MonHoc::with('nganh')->where('ten_mon', 'like', '%' . $this->searchName . '%')->paginate(10);
        $nganhs = Nganh::all();
        return view('livewire.admin.monhoc.main', compact('monhocs', 'nganhs'));
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
        $this->deleteMonHocId = $id;
        $this->isConfirmModalOpen = true;
    }
    public function closeConfirmModal()
    {
        $this->deleteMonHocId = null;
        $this->isConfirmModalOpen = false;
    }
    public function resetForm()
    {
        $this->ten_mon = null;
        $this->nganh_id = null;
        $this->isEditMode = false;
    }

    public function createMonHoc(FlasherInterface $flasher)
    {
        $this->validate([
            'ten_mon' => 'required',
            'nganh_id' => 'required|exists:nganhs,id',
        ]);

        $exists = MonHoc::where('ten_mon', $this->ten_mon)->
            exists();
        if ($exists) {
            // Thêm thông báo lỗi
            $flasher->addError('Môn đã tồn tại.');
            return;
        }
        MonHoc::create([
            'ten_mon' => $this->ten_mon,
            'nganh_id' => $this->nganh_id,
        ]);
        $flasher->addSuccess('Tạo môn thành công!');

        $this->closeModal();
        $this->resetForm();
    }

    public function editMonHoc($id)
    {

        $monhoc = MonHoc::findOrFail($id);
        $this->id = $monhoc->id;
        $this->ten_mon = $monhoc->ten_mon;
        $this->nganh_id = $monhoc->nganh_id;
        $this->isEditMode = true;
        $this->openModal();
    }

    public function updateMonHoc(FlasherInterface $flasher)
    {
        $this->validate([
            'ten_mon' => 'required',
            'nganh_id' => 'required',
        ]);
        $monhoc = MonHoc::findOrFail($this->id);
        $monhoc->update([
            'ten_mon' => $this->ten_mon,
            'nganh_id' => $this->nganh_id,
        ]);
        $flasher->addSuccess('Cập nhật môn thành công!');
        $this->closeModal();
        $this->resetForm();
    }

    public function deleteMonHoc(FlasherInterface $flasher)
    {
        if ($this->deleteMonHocId) {
            MonHoc::findOrFail($this->deleteMonHocId)->delete();
            $this->closeConfirmModal();
            $flasher->addSuccess('Xoá môn thành công!');
        }
    }
}
