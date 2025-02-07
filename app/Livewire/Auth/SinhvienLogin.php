<?php

namespace App\Livewire\Auth;

use Flasher\Prime\FlasherInterface;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Title;

#[Title('Đăng nhập - Thư viện ITC')]

class SinhvienLogin extends Component
{
    public $email;
    public $password;
    public $showPassword = false;

    public function login(FlasherInterface $flasher)
    {
        $this->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ], [
            'email.required' => 'Email là bắt buộc.',
            'email.email' => 'Vui lòng nhập một địa chỉ email hợp lệ.',
            'password.required' => 'Mật khẩu là bắt buộc.',
            'password.min' => 'Mật khẩu phải có ít nhất 6 ký tự.',
        ]);

        // Thử đăng nhập với guard 'sinhvien'
        if (Auth::guard('sinhvien')->attempt(['email' => $this->email, 'password' => $this->password]) || Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
            $flasher->addSuccess('Đăng nhập thành công!');
            return redirect()->intended('/');
        } else {
            $flasher->addError('Email hoặc mật khẩu không đúng!');
        }
    }

    public function togglePasswordVisibility()
    {
        $this->showPassword = !$this->showPassword;
    }
    public function render()
    {
        return view('livewire.auth.sinhvien-login');
    }
}
