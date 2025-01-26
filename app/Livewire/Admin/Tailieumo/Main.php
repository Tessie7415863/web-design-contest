<?php

namespace App\Livewire\Admin\Tailieumo;

use App\Models\Khoa;
use App\Models\LoaiTaiLieu;
use App\Models\MonHoc;
use App\Models\Nganh;
use App\Models\NhaXuatBan;
use App\Models\TacGia;
use App\Models\TaiLieuMo;
use Flasher\Prime\FlasherInterface;
use Livewire\Component;
use Livewire\WithPagination;

class Main extends Component
{
    use WithPagination;
    public $id, $ten_tai_lieu, $loai_tai_lieu, $tac_gia_id, $nha_xuat_ban_id, $nam_phat_hanh, $so_trang, $isbn, $link_tai_ve, $mon_hoc_id, $nganh_id, $khoa_id;

    public $deleteTaiLieuMoId;
    public $searchName = '';
    public $isEditMode = false;
    public $isModalOpen = false;
    public $isConfirmModalOpen = false;
    public function render()
    {
        $tailieumos = TaiLieuMo::where('ten_tai_lieu', 'like', '%' . $this->searchName . '%')->paginate(10);
        $tacgias = TacGia::all();
        $nhaxuatbans = NhaXuatBan::all();
        $nganhs = Nganh::all();
        $khoas = Khoa::all();
        $monhocs = MonHoc::all();
        $loaitailieus = LoaiTaiLieu::all();
        return view('livewire.admin.tailieumo.main', compact('tailieumos', 'tacgias', 'nhaxuatbans', 'nganhs', 'khoas', 'monhocs', 'loaitailieus'));
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
        $this->deleteTaiLieuMoId = $id;
        $this->isConfirmModalOpen = true;
    }
    public function closeConfirmModal()
    {
        $this->deleteTaiLieuMoId = null;
        $this->isConfirmModalOpen = false;
    }

    public function resetForm()
    {
        $this->ten_tai_lieu = null;
        $this->loai_tai_lieu = null;
        $this->tac_gia_id = null;
        $this->nha_xuat_ban_id = null;
        $this->nam_phat_hanh = null;
        $this->so_trang = null;
        $this->isbn = null;
        $this->link_tai_ve = null;
        $this->mon_hoc_id = null;
        $this->nganh_id = null;
        $this->khoa_id = null;
        $this->isEditMode = false;
    }

    public function createTaiLieuMo(FlasherInterface $flasher)
    {
        $this->validate([
            'ten_tai_lieu' => 'required',
            'loai_tai_lieu' => 'required',
            'tac_gia_id' => 'required',
            'nha_xuat_ban_id' => 'required',
            'nam_phat_hanh' => 'nullable',
            'so_trang' => 'nullable',
            'isbn' => 'nullable',
            'link_tai_ve' => 'nullable',
            'mon_hoc_id' => 'required',
            'nganh_id' => 'required',
            'khoa_id' => 'required',
        ]);

        // Kiểm tra trùng lặp tên tài liệu
        // $exists = TaiLieuMo::where('ten_tai_lieu', $this->ten_tai_lieu)->exists();
        // if ($exists) {
        //     $existsAuthor = TaiLieuMo::where('ten_tai_lieu', $this->ten_tai_lieu)->where('tac_gia_id', $this->tac_gia_id)->exists();
        //     if ($existsAuthor) {
        //         $flasher->addError('Sách đã tồn tại.');
        //         return;
        //     } else {
        //         return;
        //     }
        // }

        TaiLieuMo::create([
            'ten_tai_lieu' => $this->ten_tai_lieu,
            'loai_tai_lieu_id' => $this->loai_tai_lieu_id,
            'tac_gia_id' => $this->tac_gia_id,
            'nha_xuat_ban_id' => $this->nha_xuat_ban_id,
            'nam_phat_hanh' => $this->nam_phat_hanh,
            'so_trang' => $this->so_trang,
            'isbn' => $this->isbn,
            'link_tai_ve' => $this->link_tai_ve,
            'mon_hoc_id' => $this->mon_hoc_id,
            'nganh_id' => $this->nganh_id,
            'khoa_id' => $this->khoa_id,
        ]);

        $flasher->addSuccess('Tạo tài liệu thành công!');
        $this->closeModal();
        $this->resetForm();
    }

    public function editTaiLieuMo($id)
    {

        $tailieumo = TaiLieuMo::findOrFail($id);
        $this->id = $tailieumo->id;
        $this->ten_tai_lieu = $tailieumo->ten_tai_lieu;
        $this->loai_tai_lieu_id = $tailieumo->loai_tai_lieu_id;
        $this->tac_gia_id = $tailieumo->tac_gia_id;
        $this->nha_xuat_ban_id = $tailieumo->nha_xuat_ban_id;
        $this->nam_phat_hanh = $tailieumo->nam_phat_hanh;
        $this->so_trang = $tailieumo->so_trang;
        $this->isbn = $tailieumo->isbn;
        $this->link_tai_ve = $tailieumo->link_tai_ve;
        $this->mon_hoc_id = $tailieumo->mon_hoc_id;
        $this->nganh_id = $tailieumo->nganh_id;
        $this->khoa_id = $tailieumo->khoa_id;
        $this->isEditMode = true;
        $this->openModal();
    }

    public function updateSach(FlasherInterface $flasher)
    {
        $this->validate([
            'ten_tai_lieu' => 'required',
            'loai_tai_lieu' => 'required',
            'tac_gia_id' => 'required',
            'nha_xuat_ban_id' => 'required',
            'nam_phat_hanh' => 'nullable',
            'so_trang' => 'nullable',
            'isbn' => 'nullable',
            'link_tai_ve' => 'nullable',
            'mon_hoc_id' => 'required',
            'nganh_id' => 'required',
            'khoa_id' => 'required',
        ]);
        // Kiểm tra trùng lặp tên sách
        $exists = TaiLieuMo::where('ten_tai_lieu', $this->ten_tai_lieu)->exists();
        if ($exists) {
            $existsAuthor = TaiLieuMo::where('ten_tai_lieu', $this->ten_tai_lieu)->where('tac_gia_id', $this->tac_gia_id)->exists();
            if ($existsAuthor) {
                $flasher->addError('Sách đã tồn tại.');
                return;
            } else {
                return;
            }
        }

        TaiLieuMo::create([
            'ten_tai_lieu' => $this->ten_tai_lieu,
            'loai_tai_lieu_id' => $this->loai_tai_lieu_id,
            'tac_gia_id' => $this->tac_gia_id,
            'nha_xuat_ban_id' => $this->nha_xuat_ban_id,
            'nam_phat_hanh' => $this->nam_phat_hanh,
            'so_trang' => $this->so_trang,
            'isbn' => $this->isbn,
            'link_tai_ve' => $this->link_tai_ve,
            'mon_hoc_id' => $this->mon_hoc_id,
            'nganh_id' => $this->nganh_id,
            'khoa_id' => $this->khoa_id,
        ]);

        $flasher->addSuccess('Tạo tài liệu thành công!');
        $this->closeModal();
        $this->resetForm();
    }

    public function deleteTaiLieuMo(FlasherInterface $flasher)
    {
        if ($this->deleteTaiLieuMoId) {
            TaiLieuMo::findOrFail($this->deleteTaiLieuMoId)->delete();
            $this->closeConfirmModal();
            $flasher->addSuccess('Xoá tài liệu thành công!');
        }
    }
}
