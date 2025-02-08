<?php

namespace App\Livewire;

use App\Models\SinhVien;
use Livewire\Component;

class SinhVienCount extends Component
{
    public $SinhVienCount;
    public $bgColor;
    public function mount () {
        $this -> SinhVienCount = SinhVien::count();
        $colors = ['bg-blue-500', 'bg-red-500', 'bg-green-500', 'bg-yellow-500', 'bg-purple-500', 'bg-pink-500', 'bg-indigo-500'];
        $this->bgColor = $colors[array_rand($colors)]; // Chọn màu ngẫu nhiên
    }
    public function render()
    {
        return view('livewire.sinh-vien-count');
    }
}
