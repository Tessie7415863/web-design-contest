<?php

namespace App\Livewire\Admin\Hoadonphat;

use App\Models\HoaDonPhat;
use App\Models\Phat;
use Flasher\Prime\FlasherInterface;
use Livewire\Component;
use Livewire\WithPagination;

class Main extends Component
{
    use WithPagination;
    public $id, $phat_id, $ngay_lap, $ngay_thanh_toan, $trang_thai;

    public $deleteHoaDonPhat;
    public $searchName = '';
    public $isEditMode = false;
    public $isModalOpen = false;
    public $isConfirmModalOpen = false;
    public function render()
    {
        $hoadonphats = HoaDonPhat::paginate(10);
        $phats = Phat::all();
        return view('livewire.admin.hoadonphat.main', compact('phats', 'hoadonphats'));
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
        $this->deleteHoaDonPhat = $id;
        $this->isConfirmModalOpen = true;
    }
    public function closeConfirmModal()
    {
        $this->deleteHoaDonPhat = null;
        $this->isConfirmModalOpen = false;
    }
    public function resetForm()
    {
        $this->id = null;
        $this->phat_id = null;
        $this->ngay_lap = null;
        $this->ngay_thanh_toan = null;
        $this->trang_thai = null;
        $this->isEditMode = false;
    }

    public function createHoaDonPhat(FlasherInterface $flasher)
    {
        $this->validate([
            'phat_id' => 'required|exists:phats,id',
            'ngay_lap' => 'required',
            'ngay_thanh_toan' => 'required',
            'trang_thai' => 'required',
        ]);

        Phat::create([
            'phat_id' => $this->phat_id,
            'ngay_lap' => $this->ngay_lap,
            'ngay_thanh_toan' => $this->ngay_thanh_toan,
            'trang_thai' => $this->trang_thai,
        ]);
        $flasher->addSuccess('Tạo đơn phạt thành công!');
        $this->closeModal();
        $this->resetForm();
    }

    public function editHoaDonPhat($id)
    {

        $hoadonphat = HoaDonPhat::findOrFail($id);
        $this->id = $hoadonphat->id;
        $this->phat_id = $hoadonphat->phat_id;
        $this->ngay_lap = $hoadonphat->ngay_lap;
        $this->ngay_thanh_toan = $hoadonphat->ngay_thanh_toan;
        $this->trang_thai = $hoadonphat->trang_thai;
        $this->isEditMode = true;
        $this->openModal();
    }

    public function updateHoaDonPhat(FlasherInterface $flasher)
    {
        $this->validate([
            'phat_id' => 'required|exists:phats,id',
            'ngay_lap' => 'required',
            'ngay_thanh_toan' => 'required',
            'trang_thai' => 'required',
        ]);
        $hoadonphat = HoaDonPhat::findOrFail($this->id);
        $hoadonphat->update([
            'phat_id' => $this->phat_id,
            'ngay_lap' => $this->ngay_lap,
            'ngay_thanh_toan' => $this->ngay_thanh_toan,
            'trang_thai' => $this->trang_thai,
        ]);
        $flasher->addSuccess('Cập nhật đơn phạt thành công!');
        $this->closeModal();
        $this->resetForm();
    }

    public function deleteHoaDonPhat(FlasherInterface $flasher)
    {
        if ($this->deleteHoaDonPhat) {
            Phat::findOrFail($this->deleteHoaDonPhat)->delete();
            $this->closeConfirmModal();
            $flasher->addSuccess('Xoá đơn phạt thành công!');
        }
    }
}
