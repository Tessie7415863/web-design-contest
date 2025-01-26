<?php

namespace App\Livewire\Admin\Cuonsach;

use App\Models\CuonSach;
use App\Models\Sach;
use App\Models\ViTriSach;
use Flasher\Prime\FlasherInterface;
use Livewire\Component;
use Livewire\WithPagination;

class Main extends Component
{
    use WithPagination;
    public $id, $sach_id, $vi_tri_sach_id, $tinh_trang;

    public $deleteCuonSachId;
    public $searchName = '';
    public $isEditMode = false;
    public $isModalOpen = false;
    public $isConfirmModalOpen = false;
    public function render()
    {
        $sachs = Sach::all();
        $cuonsachs = CuonSach::paginate(10);
        $vitrisachs = ViTriSach::all();
        return view('livewire.admin.cuonsach.main', compact('cuonsachs', 'vitrisachs', 'sachs'));
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
        $this->deleteCuonSachId = $id;
        $this->isConfirmModalOpen = true;
    }
    public function closeConfirmModal()
    {
        $this->deleteCuonSachId = null;
        $this->isConfirmModalOpen = false;
    }
    public function resetForm()
    {
        $this->id = null;
        $this->sach_id = '';
        $this->vi_tri_sach_id = '';
        $this->tinh_trang = '';
        $this->isEditMode = false;
    }

    public function createCuonSach(FlasherInterface $flasher)
    {
        $this->validate([
            'sach_id' => 'required',
            'vi_tri_sach_id' => 'required',
            'tinh_trang' => 'required|in:Con,Muon,Bao_Tri,Mat',
        ]);

        CuonSach::create([
            'sach_id' => $this->sach_id,
            'vi_tri_sach_id' => $this->vi_tri_sach_id,
            'tinh_trang' => $this->tinh_trang,
        ]);

        $flasher->addSuccess('Tạo cuốn sách thành công!');
        $this->closeModal();
        $this->resetForm();
    }

    public function editCuonSach($id)
    {

        $cuonsach = CuonSach::findOrFail($id);
        $this->id = $cuonsach->id;
        $this->sach_id = $cuonsach->sach_id;
        $this->vi_tri_sach_id = $cuonsach->vi_tri_sach_id;
        $this->tinh_trang = $cuonsach->tinh_trang;
        $this->isEditMode = true;
        $this->openModal();
    }

    public function updateCuonSach(FlasherInterface $flasher)
    {
        $this->validate([
            'sach_id' => 'required',
            'vi_tri_sach_id' => 'required',
            'tinh_trang' => 'required',
        ]);
        $cuonsach = CuonSach::findOrFail($this->id);
        $cuonsach->update([
            'sach_id' => $this->sach_id,
            'vi_tri_sach_id' => $this->vi_tri_sach_id,
            'tinh_trang' => $this->tinh_trang,
        ]);



        $flasher->addSuccess('Cập nhật cuốn sách thành công!');
        $this->closeModal();
        $this->resetForm();
    }

    public function deleteCuonSach(FlasherInterface $flasher)
    {
        if ($this->deleteCuonSachId) {
            Sach::findOrFail($this->deleteCuonSachId)->delete();
            $this->closeConfirmModal();
            $flasher->addSuccess('Xoá cuốn sách thành công!');
        }
    }
}
