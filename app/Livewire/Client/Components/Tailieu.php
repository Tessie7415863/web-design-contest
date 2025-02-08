<?php

namespace App\Livewire\Client\Components;

use App\Models\Khoa;
use App\Models\MonHoc;
use App\Models\Nganh;
use App\Models\NhaXuatBan;
use App\Models\TacGia;
use App\Models\TaiLieuMo;
use App\Models\TheLoai;
use Flasher\Prime\FlasherInterface;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;
use Livewire\Component;

#[Title('Tài liệu - Thư viện ITC')]
class Tailieu extends Component
{
    #[Url]
    public $selected_tacgias = [];
    #[Url]
    public $selected_nhaxuatbans = [];
    #[Url]
    public $selected_mons = [];
    #[Url]
    public $selected_khoas = [];
    #[Url]
    public $selected_nganhs = [];
    #[URL]
    public $selected_theloais = [];
    public $tacgias = [];
    public $nhaxuatbans = [];
    public $mons = [];
    public $khoas = [];
    public $nganhs = [];
    public $theloais = [];
    public $nams = [];
    public $start_year;
    public $end_year;
    public $showTacGias = false;
    public $showNhaXuatBans = false;
    public $showMons = false;
    public $showKhoas = false;
    public $showNganhs = false;
    public $showTheLoais = false;
    public $showNams = true;
    public $sort = 'latest';
    public $showModal = false;
    public $search;
    public $selectedTailieumo = null;
    public $selectedTailieumoDetails = null;
    public function mount()
    {
        $this->tacgias = TacGia::all();
        $this->nhaxuatbans = NhaXuatBan::all();
        $this->mons = MonHoc::all();
        $this->khoas = Khoa::all();
        $this->nganhs = Nganh::all();
        $this->theloais = TheLoai::all();
        $this->nams = [1900, 2025];
        $this->start_year = min($this->nams);
        $this->end_year = max($this->nams);
    }
    public function render()
    {
        $query = TaiLieuMo::query();
        if (!empty($this->selected_tacgias)) {
            $query->whereIn('tac_gia_id', $this->selected_tacgias);
        }
        if (!empty($this->selected_nhaxuatbans)) {
            $query->whereIn('nha_xuat_ban_id', $this->selected_nhaxuatbans);
        }
        if (!empty($this->selected_mons)) {
            $query->whereIn('mon_hoc_id', $this->selected_mons);
        }
        if (!empty($this->selected_khoas)) {
            $query->whereIn('khoa_id', $this->selected_khoas);
        }
        if (!empty($this->selected_nganhs)) {
            $query->whereIn('nganh_id', $this->selected_nganhs);
        }
        if (!empty($this->selected_theloais)) {
            $query->whereIn('the_loai_id', $this->selected_theloais);
        }

        if (!empty($this->search)) {
            $query->where('ten_tai_lieu', 'like', '%' . $this->search . '%');
        }
        if ($this->sort == 'latest') {
            $query->latest();
        }
        if ($this->sort == 'oldest') {
            $query->oldest();
        }
        if (
            $this->start_year && $this->end_year
        ) {
            $query->whereBetween('nam_phat_hanh', [$this->start_year, $this->end_year]);
        }
        // Thực thi query
        $tailieumos = $query->paginate(20);
        return view('livewire.client.components.tailieu', [
            'tailieumos' => $tailieumos,
            'tacgias' => $this->tacgias,
            'nhaxuatbans' => $this->nhaxuatbans,
            'mons' => $this->mons,
            'khoas' => $this->khoas,
            'nganhs' => $this->nganhs,
            'theloais' => $this->theloais
        ]);
    }
    public function showTaiLieuDetails($tai_lieu_mo_id)
    {
        $this->selectedTailieumo = TaiLieuMo::find($tai_lieu_mo_id);
        // $this->selectedTailieumoDetails = CuonSach::where('sach_id', $sach_id)->first();
        $this->showModal = true;
    }
    public function closeModal()
    {
        $this->showModal = false;
        $this->selectedTailieumo = null;
    }
    public function alert(FlasherInterface $flasher)
    {
        $flasher->addError('Thông báo', 'Bạn phải đăng nhập để mượn tài liệu');
    }
}
