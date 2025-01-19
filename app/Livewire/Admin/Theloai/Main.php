<?php

namespace App\Livewire\Admin\Theloai;

use App\Models\TheLoai;
use Flasher\Prime\FlasherInterface;
use Livewire\Component;
use Livewire\WithPagination;

class Main extends Component
{
    use WithPagination;
    public $id, $ten_the_loai, $mo_ta;

    public $deleteTheLoaiId;
    public $searchName = '';
    public $isEditMode = false;
    public $isModalOpen = false;
    public $isConfirmModalOpen = false;

    public function render()
    {
        $theloais = TheLoai::where('ten_the_loai', 'like', '%' . $this->searchName . '%')->paginate(10);
        return view('livewire.admin.theloai.main', compact('theloais'));
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
        $this->deleteTheLoaiId = $id;
        $this->isConfirmModalOpen = true;
    }
    public function closeConfirmModal()
    {
        $this->deleteTheLoaiId = null;
        $this->isConfirmModalOpen = false;
    }
    public function resetForm()
    {
        $this->ten_the_loai = null;
        $this->mo_ta = null;
        $this->isEditMode = false;
    }

    public function createTheLoai(FlasherInterface $flasher)
    {
        $this->validate([
            'ten_the_loai' => 'required',
            'mo_ta' => 'nullable',
        ]);

        // Kiểm tra trùng lặp tên thể loại
        $exists = TheLoai::where('ten_the_loai', $this->ten_the_loai)->exists();
        if ($exists) {
            // Thêm thông báo lỗi
            $flasher->addError('Thể loại đã tồn tại.');
            return;
        }

        TheLoai::create([
            'ten_the_loai' => $this->ten_the_loai,
            'mo_ta' => $this->mo_ta,
        ]);

        $flasher->addSuccess('Tạo thể loại thành công!');
        $this->closeModal();
        $this->resetForm();
    }

    public function editTheLoai($id)
    {

        $theloai = TheLoai::findOrFail($id);
        $this->id = $theloai->id;
        $this->ten_the_loai = $theloai->ten_the_loai;
        $this->mo_ta = $theloai->mo_ta;
        $this->isEditMode = true;
        $this->openModal();
    }

    public function updateTheLoai(FlasherInterface $flasher)
    {
        $this->validate([
            'ten_the_loai' => 'required',
            'mo_ta' => 'nullable',
        ]);
        $theloai = TheLoai::findOrFail($this->id);
        $theloai->update([
            'ten_the_loai' => $this->ten_the_loai,
            'mo_ta' => $this->mo_ta,
        ]);
        $flasher->addSuccess('Cập nhật thể loại thành công!');
        $this->closeModal();
        $this->resetForm();
    }

    public function deleteTheLoai(FlasherInterface $flasher)
    {
        if ($this->deleteTheLoaiId) {
            TheLoai::findOrFail($this->deleteTheLoaiId)->delete();
            $this->closeConfirmModal();
            $flasher->addSuccess('Xoá thể loại thành công!');
        }
    }
}
