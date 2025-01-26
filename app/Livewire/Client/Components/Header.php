<?php

namespace App\Livewire\Client\Components;

use Livewire\Component;

class Header extends Component
{
    public $search;
    public function updatedSearch()
    {
        $this->dispatch('searchUpdated', $this->search);
    }
    public function render()
    {
        return view('livewire.client.components.header');
    }
}
