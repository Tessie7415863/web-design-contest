<?php

namespace App\Livewire\Client\Components;

use Livewire\Component;

class Sidebar extends Component
{
    public $filters = [
        'categories' => [],
        'years' => [],
        'status' => [],
        'khoa' => [],
        'nganh' => [],
    ];
    public $options = [
        'categories' => ['Văn học', 'Khoa học', 'Công nghệ thông tin'],
        'years' => ['2020', '2021', '2022', '2023'],
        'status' => ['Có sẵn', 'Hết hàng', 'Đang tái bản'],
        'khoa' => ['Khoa Văn học', 'Khoa Khoa học Tự nhiên', 'Khoa Công nghệ Thông tin'],
        'nganh' => ['Lập trình web', 'Quản trị kinh doanh', 'Tâm lý học'],
    ];


    public function updatedFilters()
    {
        $this->emit('filtersChanged', $this->filters);
    }


    public function render()
    {
        return view('livewire.client.components.sidebar');
    }
}