<?php

namespace App\Livewire;

use App\Models\Categoria;
use App\Models\Curso;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateCursos extends Component
{
    use WithFileUploads;
    public $openModalCreateCurso = false;
    
    #[Validate("required",message:"Seleccione un categoría!")]
    public $categoria;

    #[Validate("required",message:"Complete el nombre del curso!")]
    public $nombre_curso;

    public $descripcion;

    #[Validate("required",message:"Complete el precio del curso!")]
    public $precio;

    #[Validate("required",message:"Complete el # de vacantes del curso!")]
    public $vacantes;

    #[Validate("image",message:"Seleccione una imágen!")]
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

        $this->validate();
        $curso = Curso::create([
            "nombre_curso" => $this->nombre_curso,
            "descripcion" => $this->descripcion,
            "precio" => $this->precio,
            "vacantes" => $this->vacantes,
            "categoria_id" => $this->categoria
        ]);

        if($this->foto){
            $Imagen = $this->foto->store("imagenes-producto");/// imagen/nameimage.jpg

            $Imagen = explode("/",$Imagen)[1];

            $curso->imagen = $Imagen;

            $curso->save();
        }

        $this->reset();

        $this->dispatch("save-curso","Curso registrado correctamente!");
    }
}
