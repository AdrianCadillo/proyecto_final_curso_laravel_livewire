<div class="p-3">
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
   <div class="w-full bg-white rounded-lg border border-transparent p-4 my-4">
       <p class="font-bold mb-4">Cursos existentes</p>
       <x-button wire:click='create'>Agregar uno nuevo</x-button> 
       <button class="px-3 py-2 border border-blue-500 bg-blue-500
       hover:bg-blue-500 cursor-pointer rounded-lg font-semibold text-white"
       wire:click='papelera'>Papelera</button>
{{--agregamos los componentes---}}
@livewire('create-cursos')
@livewire('editar-curso')
@livewire('papelera-cursos')
<div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-3">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-white uppercase bg-blue-400 hover:bg-blue-700 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    #
                </th>
                <th scope="col" class="px-6 py-3">
                    Acciones
                </th>
                <th scope="col" class="px-6 py-3">
                    Categoría
                </th>
                <th scope="col" class="px-6 py-3">
                    Nombre curso
                </th>
                <th scope="col" class="px-6 py-3">
                    Imágen
                </th>
                <th scope="col" class="px-6 py-3">
                   Descripcion
                </th>
                <th scope="col" class="px-6 py-3">
                    Precio S/.
                </th>
                <th scope="col" class="px-6 py-3">
                   # vacantes
                </th>
            </tr>
        </thead>
        <tbody>
            @forelse ($cursos as $index=> $curso)
            <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{$index+1}}
                </th>
                <td class="px-6 py-4">
                  <x-button class="bg-yellow-400 hover:bg-yellow-600" wire:click="editar('{{$curso->id_curso}}')">editar</x-button>
                  <x-danger-button class="mx-2" wire:click="ConfirmEliminadoPapelera('{{$curso->id_curso}}','{{$curso->nombre_curso}}')">eliminar</x-danger-button>
                </td>
                <td class="px-6 py-4">
                    {{$curso->nombre_categoria}} 
                </td>
                <td class="px-6 py-4">
                    {{strtoupper($curso->nombre_curso)}} 
                </td>
                <td class="px-6 py-4">
                    @php
                        $fotoCurso = $curso->imagen != null ? "galeria-productos/".$curso->imagen: "img/anonimo.png";
                    @endphp
                   <img src="{{ asset($fotoCurso) }}" alt="" style="border-radius: 50%;width: 60px;height: 60px">
                </td>
                <td class="px-6 py-4">
                    @if (!is_null($curso->descripcion))
                    {{$curso->descripcion}} 
                     @else
                      <span class="text-red-500 p-2 font-semibold">sin descripción...</span>
                    @endif
                </td>
                <td class="px-6 py-4">
                    {{$curso->precio}} 
                </td>
                <td class="px-6 py-4">
                    {{$curso->vacantes}} 
                </td>
                
            </tr> 
            @empty
                
            @endforelse
        </tbody>
    </table>
    
</div>

   </div>
</div>

@script
 <script type="module">
    $wire.on("save-curso",function(mensaje){
      Swal.fire({
        title:"Mensaje del sistema!",
        text:mensaje,
        icon:"success"
      });
    });

    $wire.on("confirmar-eliminado-curso",(mensajeConfirm)=>{
    Swal.fire({
        title: mensajeConfirm,
        text: "AL eliminar se enviará directamente a la papelera!",
        icon: "question",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Si, eliminar!"
        }).then((result) => {
        if (result.isConfirmed) {
           $wire.dispatch("eliminar");
        }
        });
    });

    $wire.on("confirm-forzar-eliminado",(mensajeConfirm)=>{
    Swal.fire({
        title: mensajeConfirm,
        text: "Al eliminar se borrará de la base de datos y no se podrá recuperarlo!",
        icon: "question",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Si, eliminar!"
        }).then((result) => {
        if (result.isConfirmed) {
           $wire.dispatch("forzar-eliminado");
        }
        });
    });

    $wire.on("update-curso",function(mensaje){
      Swal.fire({
        title:"Mensaje del sistema!",
        text:mensaje,
        icon:"success"
      });
    });

    $wire.on("ok-delete",function(mensaje){
      Swal.fire({
        title:"Mensaje del sistema!",
        text:mensaje,
        icon:"success"
      });
    });

    $wire.on("ok-eliminado",function(mensaje){
      Swal.fire({
        title:"Mensaje del sistema!",
        text:mensaje,
        icon:"success"
      });
    });


 </script>
@endscript