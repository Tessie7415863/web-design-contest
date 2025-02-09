<?php

namespace App\Livewire\Table;

use App\Models\DatSach;
use Livewire\Component;

class NewDatSach extends Component
{
    public $datSachs;
    public function mount()
    {
        $this->datSachs = DatSach::latest()->take(5)->get();
    }
    public function render()
    {
        return view('livewire.table.new-dat-sach', [
            'datSachs' => $this->datSachs,
        ]);
    }
}
