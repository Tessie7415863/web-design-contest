<?php

namespace App\Livewire\Client\Components;

use Livewire\Component;

class Header extends Component
{
    public $searchQuery = '';
    public function render()
    {
        return view('livewire.client.components.header');
    }
}