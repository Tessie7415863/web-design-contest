<?php

namespace App\Livewire\Admin\Permissions;

use App\Models\Permission;
use Flasher\Prime\FlasherInterface;
use Livewire\Component;
use Livewire\WithPagination;

class Main extends Component
{

    use WithPagination;
    public $name, $guard_name;
    public $searchName = '';
    public $deletePermissionId;
    public $isEditMode = false;
    public $isModalOpen = false;
    public $isConfirmModalOpen = false;
    public function render()
    {
        $permissions = Permission::where('name', 'like', '%' . $this->searchName . '%')
            ->paginate(10);
        return view('livewire.admin.permissions.main', compact('permissions'));
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
        $this->deletePermissionId = $id;
        $this->isConfirmModalOpen = true;
    }
    public function closeConfirmModal()
    {
        $this->deletePermissionId = null;
        $this->isConfirmModalOpen = false;
    }
    public function resetForm()
    {
        $this->name = null;
        $this->guard_name = null;
    }
    public function createPermission(FlasherInterface $flasher)
    {
        $this->validate([
            'name' => 'required',
            'guard_name' => 'required',
        ]);
        Permission::create([
            'name' => $this->name,
            'guard_name' => $this->guard_name,
        ]);
        $flasher->addSuccess('Tạo Permission thành công!');

        $this->closeModal();
        $this->resetForm();
    }
    public function editPermission($id)
    {
        $permission = Permission::findOrFail($id);
        $this->name = $permission->name;
        $this->guard_name = $permission->guard_name;
        $this->openModal();
    }
    public function updatePermission(FlasherInterface $flasher)
    {
        $this->validate([
            'name' => 'required',
            'guard_name' => 'required',
        ]);
        $ơermission = Permission::findOrFail($this->id);
        $permission->update([
            'name' => $this->name,
            'guard_name' => $this->guard_name,
        ]);
        $flasher->addSuccess('Cập nhật Permission thành công!');
        $this->closeModal();
        $this->resetForm();
    }
    public function deletePermission(FlasherInterface $flasher)
    {
        if ($this->deletePermissionId) {
            Permission::findOrFail($this->deletePermissionId)->delete();
            $this->closeConfirmModal();
            $flasher->addSuccess('Xoá Permission thành công!');
        }
    }
}