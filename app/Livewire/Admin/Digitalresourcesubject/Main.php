<?php

namespace App\Livewire\Admin\Digitalresourcesubject;

use App\Models\DigitalResourceSubject;
use App\Models\MonHoc;
use App\Models\TaiLieuMo;
use Flasher\Prime\FlasherInterface;
use Livewire\Component;
use Livewire\WithPagination;

class Main extends Component
{
    use WithPagination;
    public $tai_lieu_mo_id, $mon_hoc_id;

    public $deleteDRSubject;
    public $searchName = '';
    public $isEditMode = false;
    public $isModalOpen = false;
    public $isConfirmModalOpen = false;
    public function render()
    {
        $drsubjects = DigitalResourceSubject::paginate(10);
        $tailieumos = TaiLieuMo::all();
        $monhocs = MonHoc::all();
        return view('livewire.admin.digitalresourcesubject.main', compact('drsubjects', 'monhocs', 'tailieumos'));
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

    public function openConfirmModal($tai_lieu_mo_id, $mon_hoc_id)
    {
        $this->deleteDRSubject = [
            'tai_lieu_mo_id' => $tai_lieu_mo_id,
            'mon_hoc_id' => $mon_hoc_id,
        ];

        $this->isConfirmModalOpen = true;
    }

    public function closeConfirmModal()
    {
        $this->deleteDRSubject = null;
        $this->isConfirmModalOpen = false;
    }
    public function resetForm()
    {
        $this->tai_lieu_mo_id = null;
        $this->mon_hoc_id = null;
        $this->isEditMode = false;
    }

    public function createDRSubject(FlasherInterface $flasher)
    {
        $this->validate([
            'tai_lieu_mo_id' => 'required|integer|exists:tai_lieu_mos,id',
            'mon_hoc_id' => 'required|integer|exists:mon_hocs,id',
        ]);


        $exists = DigitalResourceSubject::where('tai_lieu_mo_id', $this->tai_lieu_mo_id)
            ->where('mon_hoc_id', $this->mon_hoc_id)
            ->exists();
        if ($exists) {
            $flasher->addWarning('Digital Resource này đã tồn tại!');
            return;
        }

        DigitalResourceSubject::create([
            'tai_lieu_mo_id' => $this->tai_lieu_mo_id,
            'mon_hoc_id' => $this->mon_hoc_id,
        ]);

        $flasher->addSuccess('Tạo digital resource thành công!');
        $this->closeModal();
        $this->resetForm();
    }

    public function editDRSubject($tai_lieu_mo_id, $mon_hoc_id)
    {
        $drsubject = DigitalResourceSubject::where('tai_lieu_mo_id', $tai_lieu_mo_id)
            ->where('mon_hoc_id', $mon_hoc_id)
            ->firstOrFail();

        $this->tai_lieu_mo_id = $drsubject->tai_lieu_mo_id;
        $this->mon_hoc_id = $drsubject->mon_hoc_id;
        $this->isEditMode = true;
        $this->openModal();
    }

    public function updateDRSubject(FlasherInterface $flasher)
    {
        $this->validate([
            'tai_lieu_mo_id' => 'required',
            'mon_hoc_id' => 'required',
        ]);

        $exists = DigitalResourceSubject::where('tai_lieu_mo_id', $this->tai_lieu_mo_id)
            ->where('mon_hoc_id', $this->mon_hoc_id)
            ->exists();

        if ($exists) {
            $flasher->addWarning('Digital Resource này đã tồn tại!');
            return;
        }

        DigitalResourceSubject::where('tai_lieu_mo_id', $this->tai_lieu_mo_id)
            ->where('mon_hoc_id', $this->mon_hoc_id)
            ->update([
                'tai_lieu_mo_id' => $this->tai_lieu_mo_id,
                'mon_hoc_id' => $this->mon_hoc_id,
            ]);

        $flasher->addSuccess('Cập nhật digital resource thành công!');
        $this->closeModal();
        $this->resetForm();
    }

    public function deleteDRSubject(FlasherInterface $flasher)
    {
        if (is_array($this->deleteDRSubject) && isset($this->deleteDRSubject['tai_lieu_mo_id'], $this->deleteDRSubject['mon_hoc_id'])) {
            $drsubject = DigitalResourceSubject::where('tai_lieu_mo_id', $this->deleteDRSubject['tai_lieu_mo_id'])
                ->where('mon_hoc_id', $this->deleteDRSubject['mon_hoc_id'])
                ->firstOrFail();

            $drsubject->delete();
            $this->closeConfirmModal();
            $flasher->addSuccess('Xoá digital resource thành công!');
        } else {
            $flasher->addError('Dữ liệu không hợp lệ!');
        }
    }
}
