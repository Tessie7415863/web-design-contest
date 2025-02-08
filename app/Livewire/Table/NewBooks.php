<?php

namespace App\Livewire\Table;

use App\Models\Sach;
use Livewire\Component;

class NewBooks extends Component
{
    public $books;
    public function mount() {
        $this->books = Sach::latest()->take(5)->get();
    }
    public function render()
    {
        return view('livewire.table.new-books', [
            'books' => $this->books,
        ]);
    }
}
