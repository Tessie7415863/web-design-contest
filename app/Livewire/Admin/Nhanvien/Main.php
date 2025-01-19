<?php

namespace App\Livewire\Admin\Nhanvien;

use App\Models\BoPhan;
use App\Models\NhanVien;
use App\Models\User;
use Flasher\Prime\FlasherInterface;
use Livewire\Component;
use Livewire\WithPagination;

class Main extends Component
{
    use WithPagination;
    public $id, $user_id, $ho_ten, $chuc_vu, $email, $sdt, $dia_chi, $bo_phan_id;

    public $deleteNhanVienId;
    public $searchName = '';
    public $isEditMode = false;
    public $isModalOpen = false;
    public $isConfirmModalOpen = false;
    public function render()
    {
        $nhanviens = NhanVien::where('ho_ten', 'like', '%' . $this->searchName . '%')->paginate(10);
        $users = User::all();
        $bophans = BoPhan::all();
        return view('livewire.admin.nhanvien.main', compact('nhanviens', 'bophans', 'users'));
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
        $this->deleteNhanVienId = $id;
        $this->isConfirmModalOpen = true;
    }
    public function closeConfirmModal()
    {
        $this->deleteNhanVienId = null;
        $this->isConfirmModalOpen = false;
    }
    public function resetForm()
    {
        $this->id = null;
        $this->user_id = '';
        $this->ho_ten = '';
        $this->chuc_vu = '';
        $this->email = '';
        $this->sdt = '';
        $this->dia_chi = '';
        $this->bo_phan_id = '';
        $this->isEditMode = false;
    }

    public function createNhanVien(FlasherInterface $flasher)
    {
        $this->validate([
            'user_id' => 'required',
            'ho_ten' => 'required',
            'chuc_vu' => 'required',
            'email' => 'required',
            'sdt' => 'required',
            'dia_chi' => 'required',
            'bo_phan_id' => 'required',
        ]);

        // Kiểm tra trùng lặp tên bộ phận
        $exists = NhanVien::where('user_id', $this->user_id)->exists();
        if ($exists) {
            // Thêm thông báo lỗi
            $flasher->addError('Nhân viên đã tồn tại.');
            return;
        }

        NhanVien::create([
            'user_id' => $this->user_id,
            'ho_ten' => $this->ho_ten,
            'chuc_vu' => $this->chuc_vu,
            'email' => $this->email,
            'sdt' => $this->sdt,
            'dia_chi' => $this->dia_chi,
            'bo_phan_id' => $this->bo_phan_id,
        ]);

        $flasher->addSuccess('Tạo nhân viên thành công!');
        $this->closeModal();
        $this->resetForm();
    }

    public function editNhanVien($id)
    {

        $nhanvien = NhanVien::findOrFail($id);
        $this->id = $nhanvien->id;
        $this->user_id = $nhanvien->user_id;
        $this->ho_ten = $nhanvien->ho_ten;
        $this->chuc_vu = $nhanvien->chuc_vu;
        $this->email = $nhanvien->email;
        $this->sdt = $nhanvien->sdt;
        $this->dia_chi = $nhanvien->dia_chi;
        $this->bo_phan_id = $nhanvien->bo_phan_id;
        $this->isEditMode = true;
        $this->openModal();
    }

    public function updateNhanVien(FlasherInterface $flasher)
    {
        $this->validate([
            'user_id' => 'required',
            'ho_ten' => 'required',
            'chuc_vu' => 'required',
            'email' => 'required',
            'sdt' => 'required',
            'dia_chi' => 'required',
            'bo_phan_id' => 'required',
        ]);
        $nhanvien = NhanVien::findOrFail($this->id);
        $nhanvien->update([
            'user_id' => $this->user_id,
            'ho_ten' => $this->ho_ten,
            'chuc_vu' => $this->chuc_vu,
            'email' => $this->email,
            'sdt' => $this->sdt,
            'dia_chi' => $this->dia_chi,
            'bo_phan_id' => $this->bo_phan_id,
        ]);
        $flasher->addSuccess('Cập nhật nhân viên thành công!');
        $this->closeModal();
        $this->resetForm();
    }

    public function deleteNhanVien(FlasherInterface $flasher)
    {
        if ($this->deleteNhanVienId) {
            NhanVien::findOrFail($this->deleteNhanVienId)->delete();
            $this->closeConfirmModal();
            $flasher->addSuccess('Xoá nhân viên thành công!');
        }
    }
}
