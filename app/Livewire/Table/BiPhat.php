<?php

namespace App\Livewire\Table;

use App\Models\Phat;
use App\Models\PhieuMuon;
use App\Models\PhieuTra;
use Livewire\Component;

class BiPhat extends Component
{
    public $biphats;
    public function mount() {
        $this->biphats = Phat::with(['sinhVien', 'sach']) // Load quan hệ
            ->select('id', 'sach_id', 'ly_do', 'so_tien')
            ->get();
    }
    public function render()
    {
        return view('livewire.table.bi-phat', [
            'biphats' => $this->biphats,
        ]);
    }
}
