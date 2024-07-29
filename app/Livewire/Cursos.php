<?php

namespace App\Livewire;

use Livewire\Component;

class Cursos extends Component
{
    public function render()
    {
        /// mostramos todos los cursos
        
        return view('livewire.cursos');
    }

    /**
     * Creamos el método para crear nuevo curso
     */
    public function create(){
        $this->dispatch("create-curso");
    }
}
