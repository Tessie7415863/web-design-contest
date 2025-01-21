<?php

namespace App\Livewire\Client;

use App\Models\Sach;
use App\Models\TaiLieuMo;
use Livewire\Component;
use Livewire\WithPagination;

class HomePage extends Component
{
    use WithPagination;

    public $activeSection = 'all';
    public $featuredBooks;
    public $featuredDocuments;
    protected $listeners = ['filtersChanged'];
    public function mount()
    {
        $this->featuredBooks = Sach::all();
        $this->featuredDocuments = TaiLieuMo::all();
    }
    public function setActiveSection($category)
    {
        $this->activeSection = $category;
    }

    public function filtersChanged($filters)
    {
        // Xử lý logic filter ở đây
        $this->resetPage();
    }
    public function render()
    {
        return view('livewire.client.home-page');
    }
}