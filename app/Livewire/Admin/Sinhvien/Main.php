<?php

namespace App\Livewire\Admin\Sinhvien;

use App\Exports\SinhVienExport;
use App\Models\SinhVien;
use App\Models\User;
use Flasher\Prime\FlasherInterface;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;

class Main extends Component
{
    public $users;
    public $id, $ho_ten, $ngay_sinh, $gioi_tinh, $lop, $email, $tai_khoan, $password, $sdt, $dia_chi;
    public $isEditMode = false;
    public $isModalOpen = false;
    public $isConfirmModalOpen = false;
    public $deleteSinhVienId = null;
    public $searchName = ''; // Biến lưu trữ giá trị tìm kiếm
    public function loadSinhViens()
    {
        $this->users = User::all();
    }
    public function mount()
    {
        $this->loadSinhViens();
    }
    public function render()
    {
        // Lọc danh sách sinh viên theo tên nếu có từ khóa tìm kiếm
        $sinhviens = SinhVien::where('ho_ten', 'like', '%' . $this->searchName . '%')
            ->paginate(10);  // Sử dụng paginate để phân trang
        return view('livewire.admin.sinhvien.main', compact('sinhviens'));
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
        $this->deleteSinhVienId = $id;
        $this->isConfirmModalOpen = true;
    }

    public function closeConfirmModal()
    {
        $this->deleteSinhVienId = null;
        $this->isConfirmModalOpen = false;
    }

    public function resetForm()
    {
        $this->id = null;
        $this->ho_ten = '';
        $this->ngay_sinh = '';
        $this->gioi_tinh = '';
        $this->lop = '';
        $this->email = '';
        $this->tai_khoan = '';
        $this->password = '';
        $this->sdt = '';
        $this->dia_chi = '';
    }

    public function exportExcel()
    {
        return Excel::download(new SinhVienExport, 'sinhvien.xlsx');
    }
    public function createSinhVien(FlasherInterface $flasher)
    {
        $this->validate([
            'ho_ten' => 'required|string|max:255',
            'ngay_sinh' => 'required',
            'gioi_tinh' => 'required',
            'lop' => 'required',
            'email' => 'required|email',
            'tai_khoan' => 'required',
            'password' => 'required|min:6',
            'sdt' => 'required|min:6|max:10',
            'dia_chi' => 'required',
        ]);
        SinhVien::create([
            'ho_ten' => $this->ho_ten,
            'ngay_sinh' => $this->ngay_sinh,
            'gioi_tinh' => $this->gioi_tinh,
            'lop' => $this->lop,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'tai_khoan' => $this->tai_khoan,
            'sdt' => $this->sdt,
            'dia_chi' => $this->dia_chi,
            'created_at' => now(),
            'updated_at' => null
        ]);
        $flasher->addSuccess('Sinh viên đã được thêm thành công!');
        $this->closeModal();
        $this->loadSinhViens();
    }

    public function editSinhVien($id)
    {
        $sinhvien = SinhVien::findOrFail($id);
        $this->id = $sinhvien->id;
        $this->ho_ten = $sinhvien->ho_ten;
        $this->ngay_sinh = $sinhvien->ngay_sinh;
        $this->gioi_tinh = $sinhvien->gioi_tinh;
        $this->lop = $sinhvien->lop;
        $this->email = $sinhvien->email;
        $this->password = $sinhvien->password;
        $this->tai_khoan = $sinhvien->tai_khoan;
        $this->sdt = $sinhvien->sdt;
        $this->dia_chi = $sinhvien->dia_chi;
        $this->isEditMode = true;
        $this->openModal();
    }

    public function updateSinhVien(FlasherInterface $flasher)
    {
        $this->validate([
            'ho_ten' => 'required|string|max:255',
            'ngay_sinh' => 'required',
            'gioi_tinh' => 'required',
            'lop' => 'required',
            'email' => 'required|email',
            'tai_khoan' => 'required',
            'password' => 'required|min:6',
            'sdt' => 'required|min:6|max:10',
            'dia_chi' => 'required',
        ]);
        $sinhvien = SinhVien::findOrFail($this->id);
        $sinhvien->update([
            'ho_ten' => $this->ho_ten,
            'ngay_sinh' => $this->ngay_sinh,
            'gioi_tinh' => $this->gioi_tinh,
            'lop' => $this->lop,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'tai_khoan' => $this->tai_khoan,
            'sdt' => $this->sdt,
            'dia_chi' => $this->dia_chi,
            'updated_at' => now(),
        ]);
        $flasher->addSuccess('Sinh viên đã được cập nhật thành công!');

        $this->closeModal();
        $this->loadSinhViens();
    }

    public function deleteSinhVien(FlasherInterface $flasher)
    {
        if ($this->deleteSinhVienId) {
            SinhVien::findOrFail($this->deleteSinhVienId)->delete();
            $this->closeConfirmModal();
            $flasher->addSuccess('Xoá Sinh viên thành công!');
            $this->loadSinhViens();
        }
    }
}