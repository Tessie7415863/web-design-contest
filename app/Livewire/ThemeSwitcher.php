<?php

namespace App\Livewire;

use Livewire\Component;

class ThemeSwitcher extends Component
{
    public $theme;

    public function mount()
    {
        // Lấy theme từ session hoặc mặc định là 'light'
        $this->theme = session('theme', 'light');
    }

    public function toggleTheme()
    {
        $this->theme = $this->theme === 'dark' ? 'light' : 'dark';
        session(['theme' => $this->theme]);

        // Gửi sự kiện 'themeUpdated' đến frontend
        $this->dispatch('themeUpdated', $this->theme);
    }

    public function setTheme($theme)
    {
        $this->theme = $theme;
        session(['theme' => $this->theme]);

        $this->dispatch('themeUpdated', $this->theme);
    }



    public function render()
    {
        return view('livewire.theme-switcher');
    }
}