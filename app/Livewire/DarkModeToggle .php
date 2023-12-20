<?php

namespace App\Livewire;

use Livewire\Component;

class DarkModeToggle extends Component
{
    public $darkMode;

    public function mount()
    {
        // Inicializar el estado del modo oscuro desde localStorage o alguna otra fuente
        $this->darkMode = session('darkMode', false);
    }

    public function toggleDarkMode()
    {
        // Cambiar el estado del modo oscuro
        $this->darkMode = !$this->darkMode;

        // Guardar el estado en la sesión (o en localStorage según tus necesidades)
        session(['darkMode' => $this->darkMode]);
    }

    public function render()
    {
        // Livewire proporciona la variable $this->darkMode automáticamente a la vista
        return view('layouts.app');
    }
}
