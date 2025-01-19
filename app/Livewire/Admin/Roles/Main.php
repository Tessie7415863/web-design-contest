<?php

namespace App\Livewire\Admin\Roles;

use App\Models\Role;
use Flasher\Prime\FlasherInterface;
use Livewire\Component;
use Livewire\WithPagination;

class Main extends Component
{
    use WithPagination;
    public $id, $name, $guard_name;
    public $searchName = '';
    public $deleteRoleId;
    public $isEditMode = false;
    public $isModalOpen = false;
    public $isConfirmModalOpen = false;
    public function render()
    {
        $roles = Role::where('name', 'like', '%' . $this->searchName . '%')
            ->paginate(10);
        return view('livewire.admin.roles.main', compact('roles'));
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
        $this->deleteRoleId = $id;
        $this->isConfirmModalOpen = true;
    }
    public function closeConfirmModal()
    {
        $this->deleteRoleId = null;
        $this->isConfirmModalOpen = false;
    }
    public function resetForm()
    {
        $this->name = null;
        $this->guard_name = null;
        $this->isEditMode = false;
    }
    public function createRole(FlasherInterface $flasher)
    {
        $this->validate([
            'name' => 'required',
            'guard_name' => 'required',
        ]);
        Role::create([
            'name' => $this->name,
            'guard_name' => $this->guard_name,
        ]);
        $flasher->addSuccess('Tạo role thành công!');

        $this->closeModal();
        $this->resetForm();
    }
    public function editRole($id)
    {
        $role = Role::findOrFail($id);
        $this->id = $role->id;
        $this->name = $role->name;
        $this->guard_name = $role->guard_name;
        $this->isEditMode = true;
        $this->openModal();
    }
    public function updateRole(FlasherInterface $flasher)
    {
        $this->validate([
            'name' => 'required',
            'guard_name' => 'required',
        ]);
        $role = Role::findOrFail($this->id);
        $role->update([
            'name' => $this->name,
            'guard_name' => $this->guard_name,
        ]);
        $flasher->addSuccess('Cập nhật role thành công!');
        $this->closeModal();
        $this->resetForm();
    }
    public function deleteRole(FlasherInterface $flasher)
    {
        if ($this->deleteRoleId) {
            Role::findOrFail($this->deleteRoleId)->delete();
            $this->closeConfirmModal();
            $flasher->addSuccess('Xoá role thành công!');
        }
    }
}