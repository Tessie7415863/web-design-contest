<?php

namespace App\Livewire\Table;

use App\Models\Phat;
use App\Models\PhieuMuon;
use App\Models\PhieuTra;
use Livewire\Component;

class BiPhat extends Component
{
    public $biphats;
    public function mount()
    {
        $this->biphats = Phat::with(['sinhvien', 'sach', 'phieutra'])
            ->get();

    }
    public function render()
    {
        return view('livewire.table.bi-phat', [
            'biphats' => $this->biphats,
        ]);
    }
}