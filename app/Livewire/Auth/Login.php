<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Flasher\Prime\FlasherInterface;

class Login extends Component
{
    public $email;
    public $password;
    public $showPassword;
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

        if (Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
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
        return view('livewire.auth.login');
    }
}