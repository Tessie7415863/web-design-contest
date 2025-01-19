<?php

namespace App\Livewire\Admin\Sach;

use App\Models\Khoa;
use App\Models\MonHoc;
use App\Models\Nganh;
use App\Models\NhaXuatBan;
use App\Models\Sach;
use App\Models\TacGia;
use App\Models\TheLoai;
use Flasher\Prime\FlasherInterface;
use Livewire\Component;
use Livewire\WithPagination;

class Main extends Component
{
    use WithPagination;
    public $id, $ten_sach, $tac_gia_id, $nha_xuat_ban_id, $the_loai_id, $nam_xuat_ban, $so_trang, $isbn, $mon_hoc_id, $nganh_id, $khoa_id;

    public $deleteSachId;
    public $searchName = '';
    public $isEditMode = false;
    public $isModalOpen = false;
    public $isConfirmModalOpen = false;
    public function render()
    {
        $sachs = Sach::where('ten_sach', 'like', '%' . $this->searchName . '%')->paginate(10);
        $tacgias = TacGia::all();
        $nhaxuatbans = NhaXuatBan::all();
        $theloais = TheLoai::all();
        $monhocs = MonHoc::all();
        $nganhs = Nganh::all();
        $khoas = Khoa::all();
        return view('livewire.admin.sach.main', compact('sachs', 'tacgias', 'nhaxuatbans', 'theloais', 'monhocs', 'nganhs', 'khoas'));
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
        $this->deleteSachId = $id;
        $this->isConfirmModalOpen = true;
    }
    public function closeConfirmModal()
    {
        $this->deleteSachId = null;
        $this->isConfirmModalOpen = false;
    }
    public function resetForm()
    {
        $this->id = null;
        $this->ten_sach = '';
        $this->tac_gia_id = '';
        $this->nha_xuat_ban_id = '';
        $this->the_loai_id = '';
        $this->nam_xuat_ban = '';
        $this->so_trang = '';
        $this->isbn = '';
        $this->mon_hoc_id = '';
        $this->nganh_id = '';
        $this->khoa_id = '';
        $this->isEditMode = false;
    }

    public function createSach(FlasherInterface $flasher)
    {
        $this->validate([
            'ten_sach' => 'required',
            'tac_gia_id' => 'required',
            'nha_xuat_ban_id' => 'required',
            'the_loai_id' => 'required',
            'nam_xuat_ban' => 'nullable',
            'so_trang' => 'nullable',
            'isbn' => 'nullable',
            'mon_hoc_id' => 'required',
            'nganh_id' => 'required',
            'khoa_id' => 'required',
        ]);

        // Kiểm tra trùng lặp tên sách
        $exists = Sach::where('ten_sach', $this->ten_sach)->exists();
        if ($exists) {
            $existsAuthor = Sach::where('ten_sach', $this->ten_sach)->where('tac_gia_id', $this->tac_gia_id)->exists();
            if ($existsAuthor) {
                $flasher->addError('Sách đã tồn tại.');
                return;
            } else {
                return;
            }
        }

        Sach::create([
            'ten_sach' => $this->ten_sach,
            'tac_gia-id' => $this->tac_gia_id,
            'nha_xuat_ban_id' => $this->nha_xuat_ban_id,
            'the_loai_id' => $this->the_loai_id,
            'nam_xuat_ban' => $this->nam_xuat_ban,
            'so_trang' => $this->so_trang,
            'isbn' => $this->isbn,
            'mon_hoc_id' => $this->mon_hoc_id,
            'nganh_id' => $this->nganh_id,
            'khoa_id' => $this->khoa_id,
        ]);

        $flasher->addSuccess('Tạo nhân viên thành công!');
        $this->closeModal();
        $this->resetForm();
    }

    public function editSach($id)
    {

        $sach = Sach::findOrFail($id);
        $this->id = $sach->id;
        $this->ten_sach = $sach->ten_sach;
        $this->tac_gia_id = $sach->tac_gia_id;
        $this->nha_xuat_ban_id = $sach->nha_xuat_ban_id;
        $this->the_loai_id = $sach->the_loai_id;
        $this->nam_xuat_ban = $sach->nam_xuat_ban;
        $this->so_trang = $sach->so_trang;
        $this->isbn = $sach->isbn;
        $this->mon_hoc_id = $sach->mon_hoc_id;
        $this->nganh_id = $sach->nganh_id;
        $this->khoa_id = $sach->khoa_id;
        $this->isEditMode = true;
        $this->openModal();
    }

    public function updateNhanVien(FlasherInterface $flasher)
    {
        $this->validate([
            'ten_sach' => 'required',
            'tac-gia_id' => 'required',
            'nha_xuat_ban_id' => 'required',
            'the_loai_id' => 'required',
            'nam_xuat_ban' => 'nullable',
            'so_trang' => 'nullable',
            'isbn' => 'nullable',
            'mon_hoc_id' => 'required',
            'nganh_id' => 'required',
            'khoa_id' => 'required',
        ]);
        $sach = Sach::findOrFail($this->id);
        $sach->update([
            'ten_sach' => $this->ten_sach,
            'tac_gia-id' => $this->tac_gia_id,
            'nha_xuat_ban_id' => $this->nha_xuat_ban_id,
            'the_loai_id' => $this->the_loai_id,
            'nam_xuat_ban' => $this->nam_xuat_ban,
            'so_trang' => $this->so_trang,
            'isbn' => $this->isbn,
            'mon_hoc_id' => $this->mon_hoc_id,
            'nganh_id' => $this->nganh_id,
            'khoa_id' => $this->khoa_id,
        ]);

        // Kiểm tra trùng lặp tên sách
        $exists = Sach::where('ten_sach', $this->ten_sach)->exists();
        if ($exists) {
            $existsAuthor = Sach::where('ten_sach', $this->ten_sach)->where('tac_gia_id', $this->tac_gia_id)->exists();
            if ($existsAuthor) {
                $flasher->addError('Sách đã tồn tại.');
                return;
            } else {
                return;
            }
        }

        $flasher->addSuccess('Cập nhật sách thành công!');
        $this->closeModal();
        $this->resetForm();
    }

    public function deleteSach(FlasherInterface $flasher)
    {
        if ($this->deleteSachId) {
            Sach::findOrFail($this->deleteSachId)->delete();
            $this->closeConfirmModal();
            $flasher->addSuccess('Xoá sách thành công!');
        }
    }
}
