<?php

namespace App\Livewire\Table;

use App\Models\Phat;
use Livewire\Component;

class BiPhat extends Component
{
    public $biphats;
    public function mount()
    {
        $this->biphats = Phat::with(['sinhvien', 'sach', 'phieutra'])->latest()->take(5)->get();
    }
    public function render()
    {
        return view('livewire.table.bi-phat', ['biphats' => $this->biphats]);
    }
}