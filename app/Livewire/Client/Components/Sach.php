<?php

namespace App\Livewire\Client\Components;

use App\Models\CuonSach;
use App\Models\Khoa;
use App\Models\MonHoc;
use App\Models\Nganh;
use App\Models\NhaXuatBan;
use App\Models\Sach as ModelsSach;
use App\Models\TacGia;
use App\Models\TheLoai;
use Livewire\Component;
use Livewire\Attributes\Url;
use Livewire\WithPagination;

class Sach extends Component
{
    use WithPagination;
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
    public $cuon_sach = [];
    public $search;
    public $selectedBook = null;
    public $selectedSachDetails = null;
    public function showSachDetails($sach_id)
    {
        $this->selectedBook = ModelsSach::find($sach_id);
        $this->selectedSachDetails = CuonSach::where('sach_id', $sach_id)->first();
        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->showModal = false;
        $this->selectedBook = null;
    }
    public function mount()
    {
        $this->tacgias = TacGia::all();
        $this->nhaxuatbans = NhaXuatBan::all();
        $this->mons = MonHoc::all();
        $this->khoas = Khoa::all();
        $this->nganhs = Nganh::all();
        $this->theloais = TheLoai::all();
        $this->cuon_sach = CuonSach::all();
        $this->nams = [1900, 2025];

        $this->start_year = min($this->nams);
        $this->end_year = max($this->nams);
    }

    public function render()
    {
        // Lấy danh sách sách
        $query = ModelsSach::query();
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
            $query->where('ten_sach', 'like', '%' . $this->search . '%');
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
            $query->whereBetween('nam_xuat_ban', [$this->start_year, $this->end_year]);
        }
        // Thực thi query
        $sachs = $query->paginate(20);
        return view('livewire.client.components.sach', [
            'sachs' => $sachs,
            'tacgias' => $this->tacgias,
            'nhaxuatbans' => $this->nhaxuatbans,
            'mons' => $this->mons,
            'khoas' => $this->khoas,
            'nganhs' => $this->nganhs,
            'theloais' => $this->theloais
        ]);
    }
}
