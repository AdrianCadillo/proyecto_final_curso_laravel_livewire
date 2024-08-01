<div>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
   <x-dialog-modal wire:model='openModalEditarCurso'>
     <x-slot:title>Editar curso</x-slot:title>

     <x-slot:content>
      <label class="font-bold text-blue-500">Seleccione una categoría</label>
      <x-input-error for="categoria"></x-input-error>
      @forelse ($categorias as $categoria)
      <x-label class="mt-2 cursor-pointer">
         {{$categoria->nombre_categoria}}
        <x-input type="radio" wire:model="categoria" value="{{$categoria->id_categoria}}" name="categoria" id="categoria"></x-input>
      </x-label>
      @empty
          <span class="text-red-500">No hay categorías para mostrar</span>
      @endforelse

      <x-input placeholder="Nombre curso....." class="mb-2 w-full mt-2" wire:model='nombre_curso'></x-input>
      <x-input-error for="nombre_curso"></x-input-error>
      <x-input placeholder="Descripción....." class="mb-2 w-full" wire:model='descripcion'></x-input>
      <x-input placeholder="Precio....." class="mb-2 w-full" wire:model='precio'></x-input>
      <x-input-error for="precio"></x-input-error>
      <x-input placeholder="Número de vacantes....." class="mb-2 w-full" wire:model='vacantes'></x-input>
      <x-input-error for="vacantes"></x-input-error>
      <x-label>Seleccione una imágen</x-label>
      <x-input type="file" wire:model='foto' class="mb-2 w-full mt-2"></x-input>
      @if ($foto)
           <img src="{{$foto->temporaryUrl()}}" alt="" style="border-radius: 50%;width: 70px;height:70px;">
       @endif  

       @if ($fotoUrl)
       <img src="{{ asset('galeria-productos/'.$fotoUrl) }}" alt="" style="border-radius: 50%;width: 70px;height:70px;">
       @endif  
      <div wire:loading wire:target='foto'>
        cargando imágen......
      </div>
      <x-input-error for="foto"></x-input-error>
    </x-slot:content>

     <x-slot:footer>
         <x-button wire:loading.attr='disabled' wire:target='foto' wire:click='update'>Guardar</x-button>
         <x-danger-button wire:click="$set('openModalEditarCurso',false)" class="mx-2">Cerrar</x-danger-button>
     </x-slot:footer>
   </x-dialog-modal>
</div>

