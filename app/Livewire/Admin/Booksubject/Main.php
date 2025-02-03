<?php

namespace App\Livewire\Admin\Booksubject;

use App\Models\BookSubject;
use App\Models\MonHoc;
use App\Models\Sach;
use Flasher\Prime\FlasherInterface;
use Livewire\Component;
use Livewire\WithPagination;

class Main extends Component
{
    use WithPagination;
    public $sach_id, $mon_hoc_id;

    public $deleteBookSubject;
    public $searchName = '';
    public $isEditMode = false;
    public $isModalOpen = false;
    public $isConfirmModalOpen = false;
    public function render()
    {
        $booksubjects = BookSubject::paginate(10);
        $sachs = Sach::all();
        $monhocs = MonHoc::all();
        return view('livewire.admin.booksubject.main', compact('booksubjects', 'sachs', 'monhocs'));
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

    public function openConfirmModal($sach_id, $mon_hoc_id)
    {
        $this->deleteBookSubject = [
            'sach_id' => $sach_id,
            'mon_hoc_id' => $mon_hoc_id,
        ];

        $this->isConfirmModalOpen = true;
    }

    public function closeConfirmModal()
    {
        $this->deleteBookSubject = null;
        $this->isConfirmModalOpen = false;
    }
    public function resetForm()
    {
        $this->sach_id = null;
        $this->mon_hoc_id = null;
        $this->isEditMode = false;
    }

    public function createBookSubject(FlasherInterface $flasher)
    {
        $this->validate([
            'sach_id' => 'required|integer|exists:sachs,id',
            'mon_hoc_id' => 'required|integer|exists:mon_hocs,id',
        ]);


        $exists = BookSubject::where('sach_id', $this->sach_id)
            ->where('mon_hoc_id', $this->mon_hoc_id)
            ->exists();
        if ($exists) {
            $flasher->addWarning('Book Subject này đã tồn tại!');
            return;
        }

        BookSubject::create([
            'sach_id' => $this->sach_id,
            'mon_hoc_id' => $this->mon_hoc_id,
        ]);

        $flasher->addSuccess('Tạo book subject thành công!');
        $this->closeModal();
        $this->resetForm();
    }

    public function editBookSubject($sach_id, $mon_hoc_id)
    {
        $booksubject = BookSubject::where('sach_id', $sach_id)
            ->where('mon_hoc_id', $mon_hoc_id)
            ->firstOrFail();

        $this->sach_id = $booksubject->sach_id;
        $this->mon_hoc_id = $booksubject->mon_hoc_id;
        $this->isEditMode = true;
        $this->openModal();
    }


    public function updateBookSubject(FlasherInterface $flasher)
    {
        $this->validate([
            'sach_id' => 'required',
            'mon_hoc_id' => 'required',
        ]);

        $exists = BookSubject::where('sach_id', $this->sach_id)
            ->where('mon_hoc_id', $this->mon_hoc_id)
            ->exists();

        if ($exists) {
            $flasher->addWarning('Book Subject này đã tồn tại!');
            return;
        }

        BookSubject::where('sach_id', $this->sach_id)
            ->where('mon_hoc_id', $this->mon_hoc_id)
            ->update([
                'sach_id' => $this->sach_id,
                'mon_hoc_id' => $this->mon_hoc_id,
            ]);

        $flasher->addSuccess('Cập nhật book subject thành công!');
        $this->closeModal();
        $this->resetForm();
    }


    public function deleteBookSubject(FlasherInterface $flasher)
    {
        if (is_array($this->deleteBookSubject) && isset($this->deleteBookSubject['sach_id'], $this->deleteBookSubject['mon_hoc_id'])) {
            $booksubject = BookSubject::where('sach_id', $this->deleteBookSubject['sach_id'])
                ->where('mon_hoc_id', $this->deleteBookSubject['mon_hoc_id'])
                ->firstOrFail();

            $booksubject->delete();
            $this->closeConfirmModal();
            $flasher->addSuccess('Xoá book subject thành công!');
        } else {
            $flasher->addError('Dữ liệu không hợp lệ!');
        }
    }
}
