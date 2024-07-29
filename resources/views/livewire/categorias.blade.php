<div class="p-3">
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
   <div class="w-full bg-white rounded-lg border border-transparent p-4 my-4">
       <p class="font-bold mb-4">Categorias existentes</p>
       <x-button wire:click="create">Agregar uno nuevo</x-button> 
       <button class="px-3 py-2 border border-blue-500 bg-blue-500
       hover:bg-blue-500 cursor-pointer rounded-lg font-semibold text-white"
       wire:click="papelera">Papelera</button>

       <livewire:create-categorias>
       <livewire:papelera-categorias>
       <livewire:editar-categorias>

<div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-3">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-white uppercase bg-green-400 hover:bg-green-700 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    #
                </th>
                <th scope="col" class="px-6 py-3">
                    Categoría
                </th>
                <th scope="col" class="px-6 py-3">
                   Acciones
                </th>
            </tr>
        </thead>
        <tbody>
            @forelse ($categorias as $index=>$categoria)
            <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{$index+1}}
                </th>
                <td class="px-6 py-4">
                   {{strtoupper($categoria->nombre_categoria)}}
                </td>
                <td class="px-6 py-4">
                    <x-button class="bg-yellow-300 hover:bg-yellow-400" wire:click="editar('{{$categoria->id_categoria}}')">editar</x-button>
                    <x-danger-button wire:click="ConfirmEliminado('{{$categoria->id_categoria}}','{{$categoria->nombre_categoria}}')">eliminar</x-danger-button>
                </td>
            </tr>
            @empty
                <td colspan="3">
                    <span class="px-3 py-4 text-red-600">No hay categorías para mostrar....</span>
                </td>
            @endforelse 
        </tbody>
    </table>
    {{$categorias->links()}}
</div>

   </div>
</div>

@script
<script type="module">
  $wire.on("save",(mensaje)=>{
     Swal.fire({
        title:"Mensaje del sistema!",
        text:mensaje,
        icon:"success"
     }) 
  });

  $wire.on("update-ok",(mensaje)=>{
     Swal.fire({
        title:"Mensaje del sistema!",
        text:mensaje,
        icon:"success"
     }) 
  });
  $wire.on("eliminado-logico",function(mensaje){
   Swal.fire(
    {
        title:"Mensaje del sistema!",
        text:mensaje,
        icon:"success"
    }
   )
  });

  $wire.on("confirmar-delete",(mensajeText)=>{
    Swal.fire({
    title: mensajeText,
    text: "al eliminar se irá directamente a la papelera!",
    icon: "question",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Si eliminar!"
    }).then((result) => {
    if (result.isConfirmed) {
      $wire.dispatch("delete");
    }
    });
  });
</script>
@endscript
