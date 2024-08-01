<?php

namespace App\Livewire;

use App\Models\Categoria;
use App\Models\Curso;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditarCurso extends Component
{

    use WithFileUploads;
    public $openModalEditarCurso = false;
    #[Validate("required",message:"Seleccione un categoría!")]
    public $categoria;

    #[Validate("required",message:"Complete el nombre del curso!")]
    public $nombre_curso;

    public $descripcion;

    #[Validate("required",message:"Complete el precio del curso!")]
    public $precio;

    #[Validate("required",message:"Complete el # de vacantes del curso!")]
    public $vacantes;

    public $foto;
    public $fotoUrl;
    public $IdCurso;
    public function render()
    {
        /// enviamos las categorias
        $categorias = Categoria::all();
        return view('livewire.editar-curso',compact("categorias"));
    }

    #[On("editar-curso")]
    public function openEditaCurso($id){
        $this->openModalEditarCurso = true;
        $this->IdCurso = $id;
        $curso = Curso::join("categorias as cat","cursos.categoria_id","=","cat.id_categoria")
        ->where("id_curso",$id)->first();
        $this->categoria = $curso->categoria_id;
        $this->nombre_curso = $curso->nombre_curso;
        $this->descripcion = $curso->descripcion;
        $this->precio = $curso->precio;
        $this->vacantes = $curso->vacantes;

        $this->fotoUrl = $curso->imagen;
    }

    /**
     * Método para guardar los cambios de los cursos
     */
    public function update(){
        $this->validate();

        $curso = Curso::find($this->IdCurso);

        $curso->update([
            "nombre_curso" => $this->nombre_curso,
            "descripcion" => $this->descripcion,
            "precio" => $this->precio,
            "vacantes" => $this->vacantes,
            "categoria_id" => $this->categoria
        ]);

        if($this->foto){

            if($curso->imagen != null)
            {
                $pathStorage = storage_path("app/public/imagenes-producto/".$curso->imagen);

                unlink($pathStorage);
            }

            $Imagen = $this->foto->store("imagenes-producto");/// imagen/nameimage.jpg

            $Imagen = explode("/",$Imagen)[1];

            $curso->imagen = $Imagen;

            $curso->save();
        }

        $this->reset();

        $this->dispatch("update-curso","Curso actualizado correctamente!");
    }
}
