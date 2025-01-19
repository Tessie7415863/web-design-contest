<?php

namespace App\Livewire\Auth;

use Flasher\Prime\FlasherInterface;
use Illuminate\Support\Facades\Password;
use Livewire\Component;

class Forgot extends Component
{
    public $email;
    public function save(FlasherInterface $flasher)
    {
        $this->validate([
            'email' => 'required|email|exists:users,email|max:255',
        ], [
            'email.required' => 'Email là bắt buộc.',
            'email.email' => 'Vui lòng nhập một địa chỉ email hợp lệ.',
        ]);
        try {
            $status = Password::sendResetLink(['email' => $this->email]);

            if ($status === Password::RESET_LINK_SENT) {
                session()->flash('success', __('A password reset link has been sent to your email address.'));
                $flasher->addSuccess('Đường link tạo lại mật khẩu đã được gửi tới email của bạn!');
                $this->email = '';
            } else {
                $flasher->addError('Lỗi');

            }
        } catch (\Exception $e) {
            $flasher->addError('Lỗi');
        }
    }
    public function render()
    {
        return view('livewire.auth.forgot');
    }
}