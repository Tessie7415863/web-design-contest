<?php

namespace App\Livewire;

use App\Models\Sach;
use Livewire\Component;

class SachCount extends Component
{
    public $SachCount;
    public $bgColor;
    public function mount() {
        $this->SachCount = Sach::count();
        $colors = ['bg-blue-500', 'bg-red-500', 'bg-green-500', 'bg-yellow-500', 'bg-purple-500', 'bg-pink-500', 'bg-indigo-500'];
        $this->bgColor = $colors[array_rand($colors)]; // Chọn màu ngẫu nhiên
    }
    public function render()
    {
        return view('livewire.sach-count');
    }
}
