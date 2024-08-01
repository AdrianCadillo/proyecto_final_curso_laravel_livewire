<div>
    {{-- Do your work, then step back. --}}
    <x-dialog-modal wire:model='modalPapelera'>
        <x-slot:title>Curso en la papelera</x-slot:title>

        <x-slot name="content">
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
                              <x-button class="bg-green-400 hover:bg-green-600" wire:click="editar('{{$curso->id_curso}}')">activar</x-button>
                              <x-danger-button class="mx-2" wire:click="ConfirmDeleteCurso('{{$curso->id_curso}}','{{$curso->nombre_curso}}')">eliminar</x-danger-button>
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
        </x-slot>

        <x-slot:footer>
            <x-danger-button wire:click="$set('modalPapelera',false)">cerrar</x-danger-button>
        </x-slot:footer>
    </x-dialog-modal>
</div>
