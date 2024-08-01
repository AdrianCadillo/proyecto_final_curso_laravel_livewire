<?php

namespace App\Livewire;

use App\Models\Curso;
use Livewire\Attributes\On;
use Livewire\Component;

class Cursos extends Component
{

    public $CursoId;
    #[On(["save-curso","update-curso","ok-delete"])]
    public function render()
    {
        /// mostramos todos los cursos
        $cursos = Curso::join("categorias as cat","cursos.categoria_id","=","cat.id_categoria")
                  ->paginate(5);
        return view('livewire.cursos',compact("cursos"));
    }

    /**
     * Creamos el método para crear nuevo curso
     */
    public function create(){
        $this->dispatch("create-curso");
    }

    /**
     * Método es para editar el curso
     */
    public function editar($id){

        $this->dispatch("editar-curso",$id);
    }

    /**
     * Confirma eliminado para enviar a la papelera
     */
    public function ConfirmEliminadoPapelera($id,$cursoText){

       $this->CursoId = $id;
      $this->dispatch("confirmar-eliminado-curso","Estas seguro de eliminar al curso ".$cursoText." ?");
    }

    /**
     *  Método para enviar a la papelera
     */
    #[On("eliminar")]
    public function EliminadoPapelera(){
     $curso = Curso::find($this->CursoId);

     $curso->delete();

     $this->reset("CursoId");

     $this->dispatch("ok-eliminado","Curso enviado a la papelera!");
    }

    /**
     * Abrir el modal de cursos en la papelera
     */
    public function papelera(){
        $this->dispatch("modal-papelera");
    }
}
