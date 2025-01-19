<?php

namespace App\Livewire\Admin\Loaitailieu;

use App\Models\LoaiTaiLieu;
use Flasher\Prime\FlasherInterface;
use Livewire\Component;
use Livewire\WithPagination;

class Main extends Component
{
    use WithPagination;
    public $id, $ten_loai, $mo_ta;

    public $deleteTaiLieuId;
    public $searchName = '';
    public $isEditMode = false;
    public $isModalOpen = false;
    public $isConfirmModalOpen = false;
    public function render()
    {
        $loaitailieus = LoaiTaiLieu::where('ten_loai', 'like', '%' . $this->searchName . '%')->paginate(10);
        return view('livewire.admin.loaitailieu.main', compact('loaitailieus'));
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
        $this->deleteTaiLieuId = $id;
        $this->isConfirmModalOpen = true;
    }
    public function closeConfirmModal()
    {
        $this->deleteTaiLieuId = null;
        $this->isConfirmModalOpen = false;
    }
    public function resetForm()
    {
        $this->id = null;
        $this->ten_loai = null;
        $this->mo_ta = null;
        $this->isEditMode = false;
    }

    public function createTaiLieu(FlasherInterface $flasher)
    {
        $this->validate([
            'ten_loai' => 'required',
            'mo_ta' => 'nullable',
        ]);

        LoaiTaiLieu::create([
            'ten_loai' => $this->ten_loai,
            'mo_ta' => $this->mo_ta,
        ]);

        $flasher->addSuccess('Tạo tài liệu thành công!');
        $this->closeModal();
        $this->resetForm();
    }

    public function editTaiLieu($id)
    {

        $loaitailieu = LoaiTaiLieu::findOrFail($id);

        // if (!$loaitailieu) {
        //     return session()->flash('error', 'Tài liệu không tồn tại.');
        // }

        $this->id = $loaitailieu->id;
        $this->ten_loai = $loaitailieu->ten_loai;
        $this->isEditMode = true;
        $this->openModal();
    }

    public function updateTaiLieu(FlasherInterface $flasher)
    {
        $this->validate([
            'ten_loai' => 'required',
            'mo_ta' => 'nullable',
        ]);
        $loaitailieu = LoaiTaiLieu::findOrFail($this->id);
        $loaitailieu->update([
            'ten_loai' => $this->ten_loai,
            'mo_ta' => $this->mo_ta,
        ]);
        $flasher->addSuccess('Cập nhật tài liệu thành công!');
        $this->closeModal();
        $this->resetForm();
    }

    public function deleteTaiLieu(FlasherInterface $flasher)
    {
        if ($this->deleteTaiLieuId) {
            LoaiTaiLieu::findOrFail($this->deleteTaiLieuId)->delete();
            $this->closeConfirmModal();
            $flasher->addSuccess('Xoá tài liệu thành công!');
        }
    }
}
