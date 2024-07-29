<?php

namespace App\Livewire;

use App\Models\Categoria;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class Categorias extends Component
{
    use WithPagination;
    public $IdCategoria;
    #[On(["save","update-ok"])]
    public function render()
    {
        /**Mostramos las categorpias */
        $categorias = Categoria::paginate(5);
        return view('livewire.categorias',compact("categorias"));
    }

    /**
     * Crear una categoría
     */
    public function create()
    {
        $this->dispatch("create-categoria");
    }

    /**Método para confirmar eliminado */
    public function ConfirmEliminado($id,$categoriaText){
     $this->IdCategoria = $id;
     $this->dispatch("confirmar-delete","Estas seguro de eliminar a la categoría: ".$categoriaText." ?");
    }

    /**
     * Método para eliminar
     */
    #[On("delete")]
    public function eliminarCategoria(){
      $categoria = Categoria::find($this->IdCategoria);

      $categoria->delete();

      $this->reset("IdCategoria");
      $this->dispatch("eliminado-logico","Categoría eliminado");
    }

    /**
     * proceso papelera
     */
    public function papelera(){
        $this->dispatch("papelera");
    }

    /**
     * Método para editar las categorías
     */
    public function editar($id){
        //$this->IdCategoria = $id;
        $this->dispatch("editar-modal",$id);
    }
}
