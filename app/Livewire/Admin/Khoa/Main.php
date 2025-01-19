<?php

namespace App\Livewire\Admin\Khoa;

use App\Models\Khoa;
use Flasher\Prime\FlasherInterface;
use Livewire\Component;
use Livewire\WithPagination;

class Main extends Component
{
    use WithPagination;
    public $id, $ten_khoa, $dia_chi, $sdt, $email;

    public $deleteKhoaId;
    public $searchName = '';
    public $isEditMode = false;
    public $isModalOpen = false;
    public $isConfirmModalOpen = false;
    public function render()
    {
        $khoas = Khoa::where('ten_khoa', 'like', '%' . $this->searchName . '%')->paginate(10);
        return view('livewire.admin.khoa.main', compact('khoas'));
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
        $this->deleteKhoaId = $id;
        $this->isConfirmModalOpen = true;
    }
    public function closeConfirmModal()
    {
        $this->deleteKhoaId = null;
        $this->isConfirmModalOpen = false;
    }
    public function resetForm()
    {
        $this->ten_khoa = null;
        $this->dia_chi = null;
        $this->sdt = null;
        $this->email = null;
        $this->isEditMode = false;
    }
    public function createKhoa(FlasherInterface $flasher)
    {
        $this->validate([
            'ten_khoa' => 'required',
            'dia_chi' => 'required',
            'sdt' => 'required',
            'email' => 'required',
        ]);

        // Kiểm tra trùng lặp tên khoa
        $exists = Khoa::where('ten_khoa', $this->ten_khoa)->exists();
        if ($exists) {
            // Thêm thông báo lỗi
            $flasher->addError('Khoa đã tồn tại.');
            return;
        }

        Khoa::create([
            'ten_khoa' => $this->ten_khoa,
            'dia_chi' => $this->dia_chi,
            'email' => $this->email,
            'sdt' => $this->sdt,
        ]);

        $flasher->addSuccess('Tạo khoa thành công!');
        $this->closeModal();
        $this->resetForm();
    }

    public function editKhoa($id)
    {

        $khoa = Khoa::findOrFail($id);
        $this->id = $khoa->id;
        $this->ten_khoa = $khoa->ten_khoa;
        $this->dia_chi = $khoa->dia_chi;
        $this->sdt = $khoa->sdt;
        $this->email = $khoa->email;
        $this->isEditMode = true;
        $this->openModal();
    }

    public function updateKhoa(FlasherInterface $flasher)
    {
        $this->validate([
            'ten_khoa' => 'required',
            'dia_chi' => 'required',
            'sdt' => 'required',
            'email' => 'required',
        ]);
        $khoa = Khoa::findOrFail($this->id);
        $khoa->update([
            'ten_khoa' => $this->ten_khoa,
            'dia_chi' => $this->dia_chi,
            'sdt' => $this->sdt,
            'email' => $this->email,
        ]);
        $flasher->addSuccess('Cập nhật khoa thành công!');
        $this->closeModal();
        $this->resetForm();
    }

    public function deleteKhoa(FlasherInterface $flasher)
    {
        if ($this->deleteKhoaId) {
            Khoa::findOrFail($this->deleteKhoaId)->delete();
            $this->closeConfirmModal();
            $flasher->addSuccess('Xoá khoa thành công!');
        }
    }
}