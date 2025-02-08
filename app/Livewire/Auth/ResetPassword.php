<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Flasher\Prime\FlasherInterface;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\Attributes\Url;
use Illuminate\Support\Str;

#[Title('Tạo lại mật khẩu - Thư viện ITC')]

class ResetPassword extends Component
{
    public $token;
    #[Url]
    public $email;
    public $password;
    public $password_confirmation;
    public function mount($token)
    {
        $this->token = $token;
    }
    public function save(FlasherInterface $flasher)
    {
        $this->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6|confirmed',
        ], [
            'email.required' => 'Email là bắt buộc.',
            'email.email' => 'Vui lòng nhập một địa chỉ email hợp lệ.',
            'password.required' => 'Mật khẩu là bắt buộc.',
            'password.min' => 'Mật khẩu phải có ít nhất 6 ký tự.',
        ]);

        $status = Password::reset([
            'email' => $this->email,
            'password' => $this->password,
            'password_confirmation' => $this->password_confirmation,
            'token' => $this->token
        ], function (User $user, string $password) {
            $user->forceFill([
                'password' => Hash::make($password),
            ])->setRememberToken(Str::random(60));
            $user->save();

            event(new PasswordReset($user));
        });

        if ($status === Password::PASSWORD_RESET) {
            $flasher->addSuccess('Mật khẩu của bạn đã được tạo lại thành công!');
            return redirect('/login');
        } else {
            $flasher->addSuccess('Lỗi khi tạo lại mật khẩu!');
        }
    }
    public function render()
    {
        return view('livewire.auth.reset-password');
    }
}
