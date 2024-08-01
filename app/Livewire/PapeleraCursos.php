<?php

namespace App\Livewire;

use App\Models\Curso;
use Livewire\Attributes\On;
use Livewire\Component;

class PapeleraCursos extends Component
{
    public $modalPapelera = false;
    public $CursoIdent;
    public function render()
    {
        $cursos = Curso::onlyTrashed()
                 ->join("categorias as cat","cursos.categoria_id","=","cat.id_categoria")
                 ->paginate(5);
        return view('livewire.papelera-cursos',compact("cursos"));
    }

    #[On("modal-papelera")]
    public function openModalPapelera(){
        $this->modalPapelera = true;
    }

    /**
     * Confirmar antes de forzar eliminado del curso
     */
    public function ConfirmDeleteCurso($id,$CursoText){
        
        $this->dispatch("confirm-forzar-eliminado","Deseas borrar por completo el curso ".$CursoText." ?");
        $this->CursoIdent = $id;

    }

    /**
     * Método para forzar eliminado
     */
    #[On("forzar-eliminado")]
    public function ForzarEliminadoCurso(){

      $curso = Curso::onlyTrashed()->find($this->CursoIdent);

      if($curso->imagen != null)
        {
          $pathStorage = storage_path("app/public/imagenes-producto/".$curso->imagen);

          unlink($pathStorage);
        }

      $curso->forceDelete();

      $this->dispatch("ok-delete","Curso borrado por completo de la base de datos!");
    }
}
