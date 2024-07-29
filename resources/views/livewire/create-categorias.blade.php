<div>
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
  <x-dialog-modal wire:model="openModal">
     <x-slot:title>Crear categoría</x-slot:title>

     <x-slot:content>
        <x-input class="w-full" placeholder="Nombre de la categoría....." wire:model="nombre_categoria"></x-input>
        <x-input-error for="nombre_categoria"></x-input-error>
    </x-slot:content>

     <x-slot:footer>
        <x-button wire:click="store">Guardar</x-button>
        <x-danger-button wire:click="$set('openModal',false)" class="mx-2">Cerrar</x-danger-button>
     </x-slot:footer>

  </x-dialog-modal>
</div>
