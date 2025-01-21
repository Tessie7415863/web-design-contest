<?php

namespace App\Livewire\Admin\Vitrisach;

use App\Models\ViTriSach;
use Flasher\Prime\FlasherInterface;
use Livewire\Component;
use Livewire\WithPagination;

class Main extends Component
{
    use WithPagination;
    public $id, $khu_vuc, $tuong, $ke;

    public $deleteViTriSachId;
    public $searchName = '';
    public $isEditMode = false;
    public $isModalOpen = false;
    public $isConfirmModalOpen = false;
    public function render()
    {
        $vitrisachs = ViTriSach::where('khu_vuc', 'like', '%' . $this->searchName . '%')->paginate(10);
        return view('livewire.admin.vitrisach.main', compact('vitrisachs'));
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
        $this->deleteViTriSachId = $id;
        $this->isConfirmModalOpen = true;
    }
    public function closeConfirmModal()
    {
        $this->deleteViTriSachId = null;
        $this->isConfirmModalOpen = false;
    }
    public function resetForm()
    {
        $this->id = null;
        $this->khu_vuc = '';
        $this->tuong = '';
        $this->ke = '';
        $this->isEditMode = false;
    }

    public function createViTriSach(FlasherInterface $flasher)
    {
        $this->validate([
            'khu_vuc' => 'required',
            'tuong' => 'required',
            'ke' => 'required',
        ]);

        // Kiểm tra trùng lặp vị trí
        $exists = ViTriSach::where('khu_vuc', $this->khu_vuc)->exists();
        if ($exists) {
            // Thêm thông báo lỗi
            $flasher->addError('Khoa đã tồn tại.');
            return;
        }

        ViTriSach::create([
            'khu_vuc' => $this->khu_vuc,
            'tuong' => $this->tuong,
            'ke' => $this->ke,
        ]);

        $flasher->addSuccess('Tạo vị trí thành công!');
        $this->closeModal();
        $this->resetForm();
    }

    public function editViTriSach($id)
    {

        $vitrisach = ViTriSach::findOrFail($id);
        $this->id = $vitrisach->id;
        $this->khu_vuc = $vitrisach->khu_vuc;
        $this->tuong = $vitrisach->tuong;
        $this->ke = $vitrisach->ke;
        $this->isEditMode = true;
        $this->openModal();
    }

    public function updateViTriSach(FlasherInterface $flasher)
    {
        $this->validate([
            'khu_vuc' => 'required',
            'tuong' => 'required',
            'ke' => 'required',
        ]);
        $vitrisach = ViTriSach::findOrFail($this->id);
        $vitrisach->update([
            'khu_buc' => $this->khu_buc,
            'tuong' => $this->tuong,
            'ke' => $this->ke,
        ]);

        // Kiểm tra trùng lặp vị trí
        $exists = ViTriSach::where('khu_vuc', $this->khu_vuc)->exists();
        if ($exists) {
            if ($exists) {
                // Thêm thông báo lỗi
                $flasher->addError('Khu vực đã tồn tại.');
                return;
            }
        }

        $flasher->addSuccess('Cập nhật vị trí thành công!');
        $this->closeModal();
        $this->resetForm();
    }

    public function deleteViTriSach(FlasherInterface $flasher)
    {
        if ($this->deleteViTriSachId) {
            ViTriSach::findOrFail($this->deleteViTriSachId)->delete();
            $this->closeConfirmModal();
            $flasher->addSuccess('Xoá vị trí thành công!');
        }
    }
}
