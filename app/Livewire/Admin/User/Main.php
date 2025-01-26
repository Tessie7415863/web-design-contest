<?php

namespace App\Livewire\Admin\User;

use Flasher\Prime\FlasherInterface;
use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\On;
use Flasher\SweetAlert\Prime\SweetAlertInterface;

class Main extends Component
{
    public $userId, $name, $email, $password;
    public $isEditMode = false;
    public $isModalOpen = false;
    public $isConfirmModalOpen = false;
    public $deleteUserId = null;
    public $searchName = '';

    public function mount()
    {
        // Initialize nếu cần thiết
    }

    public function render()
    {
        $users = User::when($this->searchName, function ($query) {
            $query->where('name', 'like', '%' . $this->searchName . '%');
        })->paginate(10);

        return view('livewire.admin.user.main', compact('users'));
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
        $this->deleteUserId = $id;
        $this->isConfirmModalOpen = true;
    }

    public function closeConfirmModal()
    {
        $this->deleteUserId = null;
        $this->isConfirmModalOpen = false;
    }

    public function resetForm()
    {
        $this->userId = null;
        $this->name = '';
        $this->email = '';
        $this->password = '';
        $this->isEditMode = false;
    }

    public function createUser(FlasherInterface $flasher)
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ]);

        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);

        $flasher->addSuccess('Người dùng đã được thêm thành công!');

        $this->closeModal();
    }

    public function editUser($id)
    {
        $user = User::findOrFail($id);
        $this->userId = $user->id;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->isEditMode = true;
        $this->openModal();
    }

    public function updateUser(FlasherInterface $flasher)
    {
        if (!$this->userId) {
            $flasher->addError('Người dùng không tồn tại!');
            return;
        }

        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $this->userId,
        ]);

        $user = User::findOrFail($this->userId);
        $user->update([
            'name' => $this->name,
            'email' => $this->email,
        ]);

        $flasher->addSuccess('Người dùng đã được cập nhật thành công!');
        $this->closeModal();
    }

    public function deleteUser(FlasherInterface $flasher)
    {
        if ($this->deleteUserId) {
            $user = User::find($this->deleteUserId);

            if (!$user) {
                $flasher->addError('Người dùng không tồn tại!');
                return;
            }

            $user->delete();
            $flasher->addSuccess('Người dùng đã được xóa thành công!');
        }

        $this->closeConfirmModal();
    }
}
