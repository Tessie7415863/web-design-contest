<?php

namespace App\Livewire\Client\Components;

use Livewire\Component;

class Navigation extends Component
{
    public $activeTab = 'home';

    public function setActiveTab($tab)
    {
        $this->activeTab = $tab;
    }
    public function render()
    {
        return view('livewire.client.components.navigation');
    }
}
