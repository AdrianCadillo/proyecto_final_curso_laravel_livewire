<?php

namespace App\Livewire;

use App\Models\Categoria;
use Livewire\Attributes\On;
use Livewire\Component;

class PapeleraCategorias extends Component
{
    public $openModalPapelera = false;
    public function render()
    {
        /// mostrar las categorias en la papelera
        $categorias = Categoria::onlyTrashed()->get();
        return view('livewire.papelera-categorias',compact("categorias"));
    }

    /**
     * Meétodo para abrir el modal de ver las categorías en la papelera
     */
    #[On("papelera")]
    public function AbrirModalPapelera(){
        $this->openModalPapelera = true;
    }
}
