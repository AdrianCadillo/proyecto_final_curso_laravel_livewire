<?php

namespace App\Livewire;

use App\Models\Categoria;
use Livewire\Attributes\On;
use Livewire\Component;

class CreateCursos extends Component
{
    public $openModalCreateCurso = false;
    
    public $categoria;

    public $nombre_curso;

    public $descripcion;

    public $precio;

    public $vacantes;

    public $foto;
    public function render()
    {
        /// enviamos todas las categorías
        $categorias = Categoria::all();
        return view('livewire.create-cursos',compact("categorias"));
    }

    /**
     * Método para abrir el modal de crear cursos
     */
    #[On("create-curso")]
    public function AbrirModalCreateCurso(){
     $this->openModalCreateCurso = true;
    }

    /**
     * Método es para guardar un nuevo curso
     */
    public function store(){

    }
}
