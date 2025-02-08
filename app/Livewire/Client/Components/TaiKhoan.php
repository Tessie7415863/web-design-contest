<?php

namespace App\Livewire\Client\Components;

use Flasher\Prime\FlasherInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class TaiKhoan extends Component
{
    public $ho_ten, $ngay_sinh, $gioi_tinh, $lop, $email, $sdt, $dia_chi, $tai_khoan, $password, $new_password, $confirm_password;

    public function mount()
    {
        $sinhVien = Auth::guard('sinhvien')->user();
        $this->ho_ten = $sinhVien->ho_ten;
        $this->ngay_sinh = $sinhVien->ngay_sinh;
        $this->gioi_tinh = $sinhVien->gioi_tinh;
        $this->lop = $sinhVien->lop;
        $this->email = $sinhVien->email;
        $this->sdt = $sinhVien->sdt;
        $this->dia_chi = $sinhVien->dia_chi;
        $this->tai_khoan = $sinhVien->tai_khoan;
    }

    public function updateProfile(FlasherInterface $flasher)
    {
        $sinhVien = Auth::guard('sinhvien')->user();
        $sinhVien->update([
            'ho_ten' => $this->ho_ten,
            'ngay_sinh' => $this->ngay_sinh,
            'gioi_tinh' => $this->gioi_tinh,
            'lop' => $this->lop,
            'email' => $this->email,
            'sdt' => $this->sdt,
            'dia_chi' => $this->dia_chi,
            'tai_khoan' => $this->tai_khoan,
        ]);

        $flasher->addSuccess('Thông báo', 'Cập nhật thông tin thành công!');
    }

    public function updatePassword(FlasherInterface $flasher)
    {
        $this->validate([
            'new_password' => 'required|min:6',
            'confirm_password' => 'same:new_password',
        ]);

        $sinhVien = Auth::guard('sinhvien')->user();
        $sinhVien->update([
            'password' => Hash::make($this->new_password),
        ]);
        $flasher->addSuccess('Thông báo', 'Đổi mật khẩu thành công!');
    }

    public function render()
    {
        return view('livewire.client.components.tai-khoan');
    }
}
