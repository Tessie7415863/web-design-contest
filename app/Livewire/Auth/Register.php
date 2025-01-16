<?php

namespace App\Livewire\Auth;

use App\Models\SinhVien;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Flasher\Prime\FlasherInterface;

class Register extends Component
{
    public $name;
    public $email;
    public $password;
    public $password_confirmation;


    // Livewire Component
    public function register(FlasherInterface $flasher)
    {
        // Validate dữ liệu
        $this->validate([
            'name' => 'required|min:6',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);

        // Tạo người dùng mới
        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);
        $sinhvien = SinhVien::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);
        // Gán vai trò cho người dùng
        $user->assignRole('student');
        $sinhvien->assignRole('student');
        // Đăng ký người dùng và chuyển hướng
        if (auth()->attempt(['name' => $this->name, 'email' => $this->email, 'password' => $this->password])) {
            $flasher->addSuccess('Đăng ký thành công!');
            return redirect()->intended('/');
        } else {
            $flasher->addError('Đăng ký thất bại!');
        }
    }

    public function render()
    {
        return view('livewire.auth.register');
    }
}