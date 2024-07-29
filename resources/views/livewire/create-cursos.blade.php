<div>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
   <x-dialog-modal wire:model='openModalCreateCurso'>
     <x-slot:title>Crear curso</x-slot:title>

     <x-slot:content>
      <label class="font-bold text-blue-500">Seleccione una categoría</label>
      @forelse ($categorias as $categoria)
      <x-label class="mt-2 cursor-pointer">
         {{$categoria->nombre_categoria}}
        <x-input type="radio" wire:model="categoria" value="{{$categoria->id_categoria}}" name="categoria" id="categoria"></x-input>
      </x-label>
      @empty
          <span class="text-red-500">No hay categorías para mostrar</span>
      @endforelse

      <x-input placeholder="Nombre curso....." class="mb-2 w-full mt-2" wire:model='nombre_curso'></x-input>
      <x-input placeholder="Descripción....." class="mb-2 w-full" wire:model='descripcion'></x-input>
      <x-input placeholder="Precio....." class="mb-2 w-full" wire:model='precio'></x-input>
      <x-input placeholder="Número de vacantes....." class="mb-2 w-full" wire:model='vacantes'></x-input>

      <x-label>Seleccione una imágen</x-label>
      <x-input type="file" wire:model='foto' class="mb-2 w-full mt-2"></x-input>
     </x-slot:content>

     <x-slot:footer>
         <x-button wire:click='store'>Guardar</x-button>
         <x-danger-button wire:click="$set('openModalCreateCurso',false)" class="mx-2">Cerrar</x-danger-button>
     </x-slot:footer>
   </x-dialog-modal>
</div>
