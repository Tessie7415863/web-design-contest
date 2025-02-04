<?php

namespace App\Livewire\Admin\Phat;

use App\Models\Phat;
use App\Models\PhieuTra;
use Flasher\Prime\FlasherInterface;
use Livewire\Component;
use Livewire\WithPagination;

class Main extends Component
{
    use WithPagination;
    public $id, $phieu_tra_id, $so_tien, $ly_do, $tinh_trang;

    public $deletePhat;
    public $searchName = '';
    public $isEditMode = false;
    public $isModalOpen = false;
    public $isConfirmModalOpen = false;
    public function render()
    {
        $phats = Phat::paginate(10);
        $phieutras = PhieuTra::all();
        return view('livewire.admin.phat.main', compact('phats', 'phieutras'));
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
        $this->deletePhat = $id;
        $this->isConfirmModalOpen = true;
    }
    public function closeConfirmModal()
    {
        $this->deletePhat = null;
        $this->isConfirmModalOpen = false;
    }
    public function resetForm()
    {
        $this->id = null;
        $this->phieu_tra_id = null;
        $this->so_tien = null;
        $this->ly_do = null;
        $this->tinh_trang = null;
        $this->isEditMode = false;
    }

    public function createPhat(FlasherInterface $flasher)
    {
        $this->validate([
            'phieu_tra_id' => 'required|exists:phieu_tras,id',
            'so_tien' => 'required',
            'ly_do' => 'required',
            'tinh_trang' => 'required',
        ]);

        Phat::create([
            'phieu_tra_id' => $this->phieu_tra_id,
            'so_tien' => $this->so_tien,
            'ly_do' => $this->ly_do,
            'tinh_trang' => $this->tinh_trang,
        ]);
        $flasher->addSuccess('Tạo phạt thành công!');
        $this->closeModal();
        $this->resetForm();
    }

    public function editPhat($id)
    {

        $phat = Phat::findOrFail($id);
        $this->id = $phat->id;
        $this->phieu_tra_id = $phat->phieu_tra_id;
        $this->so_tien = $phat->so_tien;
        $this->ly_do = $phat->ly_do;
        $this->tinh_trang = $phat->tinh_trang;
        $this->isEditMode = true;
        $this->openModal();
    }

    public function updatePhat(FlasherInterface $flasher)
    {
        $this->validate([
            'phieu_tra_id' => 'required|exists:phieu_tras,id',
            'so_tien' => 'required',
            'ly_do' => 'required',
            'tinh_trang' => 'required',
        ]);
        $phat = Phat::findOrFail($this->id);
        $phat->update([
            'phieu_tra_id' => $this->phieu_tra_id,
            'so_tien' => $this->so_tien,
            'ly_do' => $this->ly_do,
            'tinh_trang' => $this->tinh_trang,
        ]);
        $flasher->addSuccess('Cập nhật phạt thành công!');
        $this->closeModal();
        $this->resetForm();
    }

    public function deletePhat(FlasherInterface $flasher)
    {
        if ($this->deletePhat) {
            Phat::findOrFail($this->deletePhat)->delete();
            $this->closeConfirmModal();
            $flasher->addSuccess('Xoá phạt thành công!');
        }
    }
}
