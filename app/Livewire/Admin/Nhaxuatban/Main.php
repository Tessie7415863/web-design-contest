<?php

namespace App\Livewire\Admin\Nhaxuatban;

use App\Models\NhaXuatBan;
use Flasher\Prime\FlasherInterface;
use Livewire\Component;
use Livewire\WithPagination;

class Main extends Component
{
    use WithPagination;
    public $id, $ten_nha_xuat_ban, $dia_chi, $sdt, $email;

    public $deleteNhaXuatBanId;
    public $searchName = '';
    public $isEditMode = false;
    public $isModalOpen = false;
    public $isConfirmModalOpen = false;

    public function render()
    {
        $nhaxuatbans = NhaXuatBan::where('ten_nha_xuat_ban', 'like', '%' . $this->searchName . '%')->paginate(10);

        return view('livewire.admin.nhaxuatban.main', compact('nhaxuatbans'));
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
        $this->deleteNhaXuatBanId = $id;
        $this->isConfirmModalOpen = true;
    }
    public function closeConfirmModal()
    {
        $this->deleteNhaXuatBanId = null;
        $this->isConfirmModalOpen = false;
    }
    public function resetForm()
    {
        $this->id = null;
        $this->ten_nha_xuat_ban = null;
        $this->dia_chi = null;
        $this->sdt = null;
        $this->email = null;
        $this->isEditMode = false;
    }

    public function createNhaXuatBan(FlasherInterface $flasher)
    {
        $this->validate([
            'ten_nha_xuat_ban' => 'required',
            'dia_chi' => 'nullable',
            'sdt' => 'nullable|min:8|max:11',
            'email' => 'nullable|email',
        ]);

        NhaXuatBan::create([
            'ten_nha_xuat_ban' => $this->ten_nha_xuat_ban,
            'dia_chi' => $this->dia_chi,
            'sdt' => $this->sdt,
            'email' => $this->email,
        ]);

        $flasher->addSuccess('Tạo nhà xuất bản thành công!');
        $this->closeModal();
        $this->resetForm();
    }

    public function editNhaXuatBan($id)
    {

        $nhaxuatban = NhaXuatBan::findOrFail($id);

        // if (!$loaitailieu) {
        //     return session()->flash('error', 'Tài liệu không tồn tại.');
        // }

        $this->id = $nhaxuatban->id;
        $this->ten_nha_xuat_ban = $nhaxuatban->ten_nha_xuat_ban;
        $this->isEditMode = true;
        $this->openModal();
    }

    public function updateNhaXuatBan(FlasherInterface $flasher)
    {
        $this->validate([
            'ten_nha_xuat_ban' => 'required',
            'dia_chi' => 'nullable',
            'sdt' => 'nullable|min:8|max:11',
            'email' => 'nullable|email',
        ]);
        $nhaxuatban = NhaXuatBan::findOrFail($this->id);
        $nhaxuatban->update([
            'ten_nha_xuat_ban' => $this->ten_nha_xuat_ban,
            'dia_chi' => $this->dia_chi,
            'sdt' => $this->sdt,
            'email' => $this->email,
        ]);
        $flasher->addSuccess('Cập nhật nhà xuất bản thành công!');
        $this->closeModal();
        $this->resetForm();
    }

    public function deleteNhaXuatBan(FlasherInterface $flasher)
    {
        if ($this->deleteNhaXuatBanId) {
            NhaXuatBan::findOrFail($this->deleteNhaXuatBanId)->delete();
            $this->closeConfirmModal();
            $flasher->addSuccess('Xoá nhà xuất bản thành công!');
        }
    }
}
