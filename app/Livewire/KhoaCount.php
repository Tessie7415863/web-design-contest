<?php

namespace App\Livewire;

use App\Models\Khoa;
use Livewire\Component;

class KhoaCount extends Component
{
    public $KhoaCount;
    public $bgColor;
    public function mount() {
        $this->KhoaCount = Khoa::count();
        $colors = ['bg-blue-500', 'bg-red-500', 'bg-green-500', 'bg-yellow-500', 'bg-purple-500', 'bg-pink-500', 'bg-indigo-500'];
        $this->bgColor = $colors[array_rand($colors)]; // Chọn màu ngẫu nhiên
    }
    public function render()
    {
        return view('livewire.khoa-count');
    }
}
