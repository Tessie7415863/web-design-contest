<?php

namespace App\Livewire\Admin\Rolehaspermission;

use App\Models\Permission;
use App\Models\Role;
use App\Models\RoleHasPermission;
use Flasher\Prime\FlasherInterface;
use Livewire\Component;
use Livewire\WithPagination;

class Main extends Component
{
    use WithPagination;
    public $role_id, $permission_id;
    public $roles;
    public $permissions;
    public $searchName = '';
    public $deleteDataId;
    public $isEditMode = false;
    public $isModalOpen = false;
    public $isConfirmModalOpen = false;
    public $editingDataId = null;
    public function mount()
    {
        $this->roles = Role::all();
        $this->permissions = Permission::all();
    }
    public function render()
    {
        $datas = RoleHasPermission::with(['role', 'permission'])->paginate(10);
        return view('livewire.admin.rolehaspermission.main', compact('datas'));
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

    public function openConfirmModal($roleId, $permissionId)
    {
        $this->role_id = $roleId;
        $this->permission_id = $permissionId;
        $this->isConfirmModalOpen = true;
    }
    public function closeConfirmModal()
    {
        $this->deleteDataId = null;
        $this->isConfirmModalOpen = false;
    }
    public function resetForm()
    {
        $this->role_id = null;
        $this->permission_id = null;
    }
    public function createData(FlasherInterface $flasher)
    {
        $this->validate([
            'role_id' => 'required|exists:roles,id',
            'permission_id' => 'required|exists:permissions,id',
        ]);
        $exists = RoleHasPermission::where('role_id', $this->role_id)
            ->where('permission_id', $this->permission_id)
            ->exists();

        if ($exists) {
            $flasher->addError('Quyền đã tồn tại cho vai trò này!');
            return;
        }
        RoleHasPermission::create([
            'role_id' => $this->role_id,
            'permission_id' => $this->permission_id,
        ]);
        $flasher->addSuccess('Tạo thành công!');

        $this->closeModal();
        $this->resetForm();
    }
    public function editData($roleId, $permissionId)
    {
        $data = RoleHasPermission::where('role_id', $roleId)
            ->where('permission_id', $permissionId)
            ->first();
        if ($data) {
            $this->editingDataId = $data->id;
            $this->role_id = $data->role_id;
            $this->permission_id = $data->permission_id;
            $this->openModal();
        }
    }

    public function updateData(FlasherInterface $flasher)
    {
        $this->validate([
            'role_id' => 'required|exists:roles,id',
            'permission_id' => 'required|exists:permissions,id',
        ]);
        $exists = RoleHasPermission::where('role_id', $this->role_id)
            ->where('permission_id', $this->permission_id)
            ->where('role_id', '!=', $this->role_id)  // Tránh lỗi vô tình so khớp với bản thân
            ->where('permission_id', '!=', $this->permission_id)
            ->exists();

        if ($exists) {
            $flasher->addError('Quyền đã tồn tại cho vai trò này!');
            return;
        }
        $data = RoleHasPermission::findOrFail($this->editingDataId);
        $data->update([
            'role_id' => $this->role_id,
            'permission_id' => $this->permission_id,
        ]);
        $flasher->addSuccess('Cập nhật thành công!');
        $this->closeModal();
        $this->resetForm();
    }
    public function deleteData(FlasherInterface $flasher)
    {
        $this->validate([
            'role_id' => 'required',
            'permission_id' => 'required',
        ]);

        // Sử dụng where với cả role_id và permission_id
        $data = RoleHasPermission::where('role_id', $this->role_id)
            ->where('permission_id', $this->permission_id)
            ->first();

        if ($data) {
            // Xóa bản ghi
            $data->delete();
            $this->closeConfirmModal();
            $flasher->addSuccess('Xoá thành công!');
        } else {
            $flasher->addError('Không tìm thấy quyền để xoá!');
        }
    }


}