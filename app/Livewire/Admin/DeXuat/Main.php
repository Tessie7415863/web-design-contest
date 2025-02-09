<?php

namespace App\Livewire\Admin\DeXuat;

use App\Models\DeXuat;
use Flasher\Prime\FlasherInterface;
use Livewire\Component;

class Main extends Component
{
    public $searchName = '', $trang_thai, $id;
    public $deleteDeXuatId;
    public $isModalOpen = false;
    public $isConfirmModalOpen = false;
    public function render()
    {
        $dexuats = DeXuat::where('tieu_de', 'like', '%' . $this->searchName . '%')->paginate(10);

        return view('livewire.admin.de-xuat.main', compact('dexuats'));
    }
    public function openConfirmModal($id)
    {
        $this->deleteDeXuatId = $id;
        $this->isConfirmModalOpen = true;
    }
    public function closeConfirmModal()
    {
        $this->deleteDeXuatId = null;
        $this->isConfirmModalOpen = false;
    }
    public function delete(FlasherInterface $flasher)
    {
        if ($this->deleteDeXuatId) {
            DeXuat::findOrFail($this->deleteDeXuatId)->delete();
            $this->closeConfirmModal();
            $flasher->addSuccess('Xoá đề xuất thành công!');
        }
    }
    public function openModal()
    {
        $this->isModalOpen = true;
    }
    public function edit($id)
    {
        $dexuat = DeXuat::findOrFail($id);
        $this->id = $dexuat->id;
        $this->trang_thai = $dexuat->trang_thai;
        $this->openModal();
    }
    public function closeModal()
    {
        $this->isModalOpen = false;
    }

    public function update(FlasherInterface $flasher)
    {

        $dexuat = DeXuat::findOrFail($this->id);
        $dexuat->update([
            'trang_thai' => $this->trang_thai,
        ]);
        $flasher->addSuccess('Cập nhật trạng thái thành công!');
        $this->closeModal();
    }
}
