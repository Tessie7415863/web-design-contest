<?php

namespace App\Livewire\Admin\Bophan;

use App\Models\BoPhan;
use Flasher\Prime\FlasherInterface;
use Livewire\Component;
use Livewire\WithPagination;

class Main extends Component
{
    use WithPagination;
    public $id, $ten_bo_phan, $mo_ta;

    public $deleteBoPhanId;
    public $searchName = '';
    public $isEditMode = false;
    public $isModalOpen = false;
    public $isConfirmModalOpen = false;

    public function render()
    {
        $bophans = BoPhan::where('ten_bo_phan', 'like', '%' . $this->searchName . '%')->paginate(10);

        return view('livewire.admin.bophan.main', compact('bophans'));
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
        $this->deleteBoPhanId = $id;
        $this->isConfirmModalOpen = true;
    }
    public function closeConfirmModal()
    {
        $this->deleteBoPhanId = null;
        $this->isConfirmModalOpen = false;
    }
    public function resetForm()
    {
        $this->ten_bo_phan = null;
        $this->mo_ta = null;
        $this->isEditMode = false;
    }

    public function createBoPhan(FlasherInterface $flasher)
    {
        $this->validate([
            'ten_bo_phan' => 'required',
            'mo_ta' => 'nullable',
        ]);

        // Kiểm tra trùng lặp tên bộ phận
        $exists = BoPhan::where('ten_bo_phan', $this->ten_bo_phan)->exists();
        if ($exists) {
            // Thêm thông báo lỗi
            $flasher->addError('Bộ phận đã tồn tại.');
            return;
        }

        BoPhan::create([
            'ten_bo_phan' => $this->ten_bo_phan,
            'mo_ta' => $this->mo_ta,
        ]);

        $flasher->addSuccess('Tạo bộ phận thành công!');
        $this->closeModal();
        $this->resetForm();
    }

    public function editBoPhan($id)
    {

        $bophan = BoPhan::findOrFail($id);
        $this->id = $bophan->id;
        $this->ten_bo_phan = $bophan->ten_bo_phan;
        $this->mo_ta = $bophan->mo_ta;
        $this->isEditMode = true;
        $this->openModal();
    }

    public function updateBoPhan(FlasherInterface $flasher)
    {
        $this->validate([
            'ten_bo_phan' => 'required',
            'mo_ta' => 'nullable',
        ]);
        $bophan = BoPhan::findOrFail($this->id);
        $bophan->update([
            'ten_bo_phan' => $this->ten_bo_phan,
            'mo_ta' => $this->mo_ta,
        ]);
        $flasher->addSuccess('Cập nhật bộ phận thành công!');
        $this->closeModal();
        $this->resetForm();
    }

    public function deleteBoPhan(FlasherInterface $flasher)
    {
        if ($this->deleteBoPhanId) {
            BoPhan::findOrFail($this->deleteBoPhanId)->delete();
            $this->closeConfirmModal();
            $flasher->addSuccess('Xoá bộ phận thành công!');
        }
    }
}
