<?php

namespace App\Livewire;

use App\Models\Categoria;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CreateCategorias extends Component
{
    public $openModal = false;

    #[Validate("required|unique:categorias")]
    public $nombre_categoria;
    public function render()
    {
        return view('livewire.create-categorias');
    }

    #[On("create-categoria")]
    public function OpenModalCreateCategoria(){
     $this->openModal = true;
    }

    /**
     * Método es para registrar una categoría
     */
    public function store(){

        $this->validate();
        Categoria::create([
            "nombre_categoria" => $this->nombre_categoria
        ]);

        $this->reset();

        $this->dispatch("save","Categoría registrado correctamente!");
    }
}
