<?php

namespace App\Livewire;

use App\Models\Categoria;
use Livewire\Attributes\On;
use Livewire\Component;

class EditarCategorias extends Component
{
    public $openModaEditar = false;
    public $nombre_categoria;
    public $IdCategoriaEditar;
    public function render()
    {
        return view('livewire.editar-categorias');
    }

    /**
     * Método para abrir el modal
     */
    #[On("editar-modal")]
    public function openEditarCategorias($id){
     $this->IdCategoriaEditar = $id;
     $categoria = Categoria::find($id);

     $this->nombre_categoria = $categoria->nombre_categoria;
     $this->openModaEditar = true;
    }

    /**
     * Método para modificar
     */
    public function updateCategoria(){

         
        $categoria = Categoria::find($this->IdCategoriaEditar);

        $categoria->update([
            "nombre_categoria" => $this->nombre_categoria
        ]);

        $this->reset();

        $this->dispatch("update-ok","Categoría modificado correctamente!");
    }
}
