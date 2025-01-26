<?php

namespace App\Livewire\Admin\Lienketsachnganh;

use App\Models\LienKetSachNganh;
use App\Models\Nganh;
use App\Models\Sach;
use Flasher\Prime\FlasherInterface;
use Livewire\Component;
use Livewire\WithPagination;

class Main extends Component
{
    use WithPagination;
    public $sach_id, $nganh_id, $ten_sach, $ten_nganh;

    public $deleteLienKetSachNganh;
    public $searchName = '';
    public $isEditMode = false;
    public $isModalOpen = false;
    public $isConfirmModalOpen = false;
    public function render()
    {
        $lienketsachnganhs = LienKetSachNganh::with('sach', 'nganh')
            ->where(function ($query) {
                $query->whereHas('sach', function ($subQuery) {
                    $subQuery->where('ten_sach', 'like', '%' . $this->searchName . '%');
                })->orWhereHas('nganh', function ($subQuery) {
                    $subQuery->where('ten_nganh', 'like', '%' . $this->searchName . '%');
                });
            })
            ->paginate(10);

        $sachs = Sach::all();
        $nganhs = Nganh::all();

        return view('livewire.admin.lienketsachnganh.main', compact('lienketsachnganhs', 'nganhs', 'sachs'));
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

    public function openConfirmModal($sach_id)
    {
        $this->deleteLienKetSachNganh = $sach_id;
        $this->isConfirmModalOpen = true;
    }
    public function closeConfirmModal()
    {
        $this->deleteLienKetSachNganh = null;
        $this->isConfirmModalOpen = false;
    }
    public function resetForm()
    {
        $this->sach_id = null;
        $this->nganh_id = null;
        $this->isEditMode = false;
    }

    public function createLienKetSachNganh(FlasherInterface $flasher)
    {
        $this->validate([
            'sach_id' => 'required',
            'nganh_id' => 'required|exists:nganhs,id',
        ]);


        LienKetSachNganh::create([
            'sach_id' => $this->sach_id,
            'nganh_id' => $this->nganh_id,
        ]);
        $flasher->addSuccess('Tạo liên kết thành công!');

        $this->closeModal();
        $this->resetForm();
    }

    public function editLienKetSachNganh($sach_id)
    {

        $lienketsachnganh = LienKetSachNganh::where('sach_id', $sach_id)->firstOrFail();
        $this->sach_id = $lienketsachnganh->sach_id;
        $this->nganh_id = $lienketsachnganh->nganh_id;
        $this->isEditMode = true;
        $this->openModal();
    }

    public function updateLienKetSachNganh(FlasherInterface $flasher)
    {
        $this->validate([
            'sach_id' => 'required',
            'nganh_id' => 'required',
        ]);
        $lienketsachnganh = LienKetSachNganh::findOrFail($this->sach_id);
        $lienketsachnganh->update([
            'sach_id' => $this->sach_id,
            'nganh_id' => $this->nganh_id,
        ]);
        $flasher->addSuccess('Cập nhật liên kết thành công!');
        $this->closeModal();
        $this->resetForm();
    }

    public function deleteLienKetSachNganh(FlasherInterface $flasher)
    {
        if ($this->deleteLienKetSachNganh) {
            LienKetSachNganh::findOrFail($this->deleteLienKetSachNganh)->delete();
            $this->closeConfirmModal();
            $flasher->addSuccess('Xoá liên kết thành công!');
        }
    }
}
