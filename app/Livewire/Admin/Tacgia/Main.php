<?php

namespace App\Livewire\Admin\Tacgia;

use App\Models\TacGia;
use Flasher\Prime\FlasherInterface;
use Livewire\Component;
use Livewire\WithPagination;

class Main extends Component
{
    use WithPagination;
    public $id, $ho_ten, $thong_tin;

    public $deleteTacGiaId;
    public $searchName = '';
    public $isEditMode = false;
    public $isModalOpen = false;
    public $isConfirmModalOpen = false;

    public function render()
    {
        $tacgias = TacGia::where('ho_ten', 'like', '%' . $this->searchName . '%')->paginate(10);
        return view('livewire.admin.tacgia.main', compact('tacgias'));
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
        $this->deleteTacGiaId = $id;
        $this->isConfirmModalOpen = true;
    }
    public function closeConfirmModal()
    {
        $this->deleteTacGiaId = null;
        $this->isConfirmModalOpen = false;
    }
    public function resetForm()
    {
        $this->id = null;
        $this->ho_ten = null;
        $this->thong_tin = null;
        $this->isEditMode = false;
    }

    public function createTacGia(FlasherInterface $flasher)
    {
        $this->validate([
            'ho_ten' => 'required',
            'thong_tin' => 'nullable',
        ]);

        // Kiểm tra trùng lặp tên tác giả
        $exists = TacGia::where('ho_ten', $this->ho_ten)->exists();
        if ($exists) {
            // Thêm thông báo lỗi
            $flasher->addError('Tác giả đã tồn tại.');
            return;
        }

        TacGia::create([
            'ho_ten' => $this->ho_ten,
            'thong_tin' => $this->thong_tin,
        ]);

        $flasher->addSuccess('Tạo tác giả thành công!');
        $this->closeModal();
        $this->resetForm();
    }

    public function editTacGia($id)
    {

        $tacgia = TacGia::findOrFail($id);

        $this->id = $tacgia->id;
        $this->ho_ten = $tacgia->ho_ten;
        $this->thong_tin = $tacgia->thong_tin;
        $this->isEditMode = true;
        $this->openModal();
    }

    public function updateTacGia(FlasherInterface $flasher)
    {
        $this->validate([
            'ho_ten' => 'required',
            'thong_tin' => 'nullable',
        ]);
        $tacgia = TacGia::findOrFail($this->id);
        $tacgia->update([
            'ho_ten' => $this->ho_ten,
            'thong_tin' => $this->thong_tin,
        ]);
        $flasher->addSuccess('Cập nhật tác giả thành công!');
        $this->closeModal();
        $this->resetForm();
    }

    public function deleteTacGia(FlasherInterface $flasher)
    {
        if ($this->deleteTacGiaId) {
            TacGia::findOrFail($this->deleteTacGiaId)->delete();
            $this->closeConfirmModal();
            $flasher->addSuccess('Xoá tác giả thành công!');
        }
    }
}
