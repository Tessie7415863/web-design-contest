<?php

namespace App\Livewire\Admin\Digitalresourcemajor;

use App\Models\DigitalResourceMajor;
use App\Models\Nganh;
use App\Models\TaiLieuMo;
use Flasher\Prime\FlasherInterface;
use Livewire\Component;
use Livewire\WithPagination;

class Main extends Component
{
    use WithPagination;
    public $tai_lieu_mo_id, $nganh_id;

    public $deleteDigitalResource;
    public $searchName = '';
    public $isEditMode = false;
    public $isModalOpen = false;
    public $isConfirmModalOpen = false;
    public function render()
    {
        $digitalresources = DigitalResourceMajor::paginate(10);
        $tailieumos = TaiLieuMo::all();
        $nganhs = Nganh::all();
        return view('livewire.admin.digitalresourcemajor.main', compact('digitalresources', 'nganhs', 'tailieumos'));
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

    public function openConfirmModal($tai_lieu_mo_id, $nganh_id)
    {
        $this->deleteDigitalResource = [
            'tai_lieu_mo_id' => $tai_lieu_mo_id,
            'nganh_id' => $nganh_id,
        ];

        $this->isConfirmModalOpen = true;
    }

    public function closeConfirmModal()
    {
        $this->deleteDigitalResource = null;
        $this->isConfirmModalOpen = false;
    }
    public function resetForm()
    {
        $this->tai_lieu_mo_id = null;
        $this->nganh_id = null;
        $this->isEditMode = false;
    }

    public function createDigitalResource(FlasherInterface $flasher)
    {
        $this->validate([
            'tai_lieu_mo_id' => 'required|integer|exists:tai_lieu_mos,id',
            'nganh_id' => 'required|integer|exists:nganhs,id',
        ]);


        $exists = DigitalResourceMajor::where('tai_lieu_mo_id', $this->tai_lieu_mo_id)
            ->where('nganh_id', $this->nganh_id)
            ->exists();
        if ($exists) {
            $flasher->addWarning('Digital Resource này đã tồn tại!');
            return;
        }

        DigitalResourceMajor::create([
            'tai_lieu_mo_id' => $this->tai_lieu_mo_id,
            'nganh_id' => $this->nganh_id,
        ]);

        $flasher->addSuccess('Tạo digital resource thành công!');
        $this->closeModal();
        $this->resetForm();
    }

    public function editDigitalResource($tai_lieu_mo_id, $nganh_id)
    {
        $digitalresource = DigitalResourceMajor::where('tai_lieu_mo_id', $tai_lieu_mo_id)
            ->where('nganh_id', $nganh_id)
            ->firstOrFail();

        $this->tai_lieu_mo_id = $digitalresource->tai_lieu_mo_id;
        $this->nganh_id = $digitalresource->nganh_id;
        $this->isEditMode = true;
        $this->openModal();
    }

    public function updateDigitalResource(FlasherInterface $flasher)
    {
        $this->validate([
            'tai_lieu_mo_id' => 'required',
            'nganh_id' => 'required',
        ]);

        $exists = DigitalResourceMajor::where('tai_lieu_mo_id', $this->tai_lieu_mo_id)
            ->where('nganh_id', $this->nganh_id)
            ->exists();

        if ($exists) {
            $flasher->addWarning('Digital Resource này đã tồn tại!');
            return;
        }

        DigitalResourceMajor::where('tai_lieu_mo_id', $this->tai_lieu_mo_id)
            ->where('nganh_id', $this->nganh_id)
            ->update([
                'tai_lieu_mo_id' => $this->tai_lieu_mo_id,
                'nganh_id' => $this->nganh_id,
            ]);

        $flasher->addSuccess('Cập nhật digital resource thành công!');
        $this->closeModal();
        $this->resetForm();
    }

    public function deleteDigitalResource(FlasherInterface $flasher)
    {
        if (is_array($this->deleteDigitalResource) && isset($this->deleteDigitalResource['tai_lieu_mo_id'], $this->deleteDigitalResource['nganh_id'])) {
            $digitalresource = DigitalResourceMajor::where('tai_lieu_mo_id', $this->deleteDigitalResource['tai_lieu_mo_id'])
                ->where('nganh_id', $this->deleteDigitalResource['nganh_id'])
                ->firstOrFail();

            $digitalresource->delete();
            $this->closeConfirmModal();
            $flasher->addSuccess('Xoá digital resource thành công!');
        } else {
            $flasher->addError('Dữ liệu không hợp lệ!');
        }
    }

}
