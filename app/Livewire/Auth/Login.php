<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Flasher\Prime\FlasherInterface;

class Login extends Component
{
    public $email;
    public $password;
    public function login(FlasherInterface $flasher)
    {
        $this->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        if (Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
            $flasher->addSuccess('Đăng nhập thành công!');
            return redirect()->intended('/');
        } else {
            $flasher->addError('Email hoặc mật khẩu không đúng!');
        }
    }

    public function render()
    {
        return view('livewire.auth.login');
    }
}