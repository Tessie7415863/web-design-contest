<?php

namespace App\Livewire\Admin\Nganh;

use App\Models\Nganh;
use App\Models\Khoa;
use Flasher\Prime\FlasherInterface;
use Livewire\Component;
use Livewire\WithPagination;


class Main extends Component
{
    use WithPagination;
    public $id, $ten_nganh, $khoa_id;

    public $deleteNganhId;
    public $searchName = '';
    public $isEditMode = false;
    public $isModalOpen = false;
    public $isConfirmModalOpen = false;
    public function render()
    {
        $nganhs = Nganh::with('khoa')->where('ten_nganh', 'like', '%' . $this->searchName . '%')->paginate(10);
        $khoas = Khoa::all(); //Lấy danh sách khoa hiển thị trong dropdown
        return view('livewire.admin.nganh.main', compact('nganhs', 'khoas'));
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
        $this->deleteNganhId = $id;
        $this->isConfirmModalOpen = true;
    }
    public function closeConfirmModal()
    {
        $this->deleteNganhId = null;
        $this->isConfirmModalOpen = false;
    }
    public function resetForm()
    {
        $this->ten_nganh = null;
        $this->khoa_id = null;
        $this->isEditMode = false;
    }

    public function createNganh(FlasherInterface $flasher)
    {
        $this->validate([
            'ten_nganh' => 'required',
            'khoa_id' => 'required|exists:khoas,id',
        ]);

        $exists = Nganh::where('ten_nganh', $this->ten_nganh)->
            exists();
        if ($exists) {
            // Thêm thông báo lỗi
            $flasher->addError('Ngành đã tồn tại.');
            return;
        }
        Nganh::create([
            'ten_nganh' => $this->ten_nganh,
            'khoa_id' => $this->khoa_id,
        ]);
        $flasher->addSuccess('Tạo ngành thành công!');

        $this->closeModal();
        $this->resetForm();
    }

    public function editNganh($id)
    {

        $nganh = Nganh::findOrFail($id);
        $this->id = $nganh->id;
        $this->ten_nganh = $nganh->ten_nganh;
        $this->khoa_id = $nganh->khoa_id;
        $this->isEditMode = true;
        $this->openModal();
    }

    public function updateNganh(FlasherInterface $flasher)
    {
        $this->validate([
            'ten_nganh' => 'required',
            'khoa_id' => 'required',
        ]);
        $nganh = Nganh::findOrFail($this->id);
        $nganh->update([
            'ten_nganh' => $this->ten_nganh,
            'khoa_id' => $this->khoa_id,
        ]);
        $flasher->addSuccess('Cập nhật ngành thành công!');
        $this->closeModal();
        $this->resetForm();
    }

    public function deleteNganh(FlasherInterface $flasher)
    {
        if ($this->deleteNganhId) {
            Nganh::findOrFail($this->deleteNganhId)->delete();
            $this->closeConfirmModal();
            $flasher->addSuccess('Xoá ngành thành công!');
        }
    }
}
