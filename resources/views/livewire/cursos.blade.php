<div class="p-3">
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
   <div class="w-full bg-white rounded-lg border border-transparent p-4 my-4">
       <p class="font-bold mb-4">Cursos existentes</p>
       <x-button wire:click='create'>Agregar uno nuevo</x-button> 
       <button class="px-3 py-2 border border-blue-500 bg-blue-500
       hover:bg-blue-500 cursor-pointer rounded-lg font-semibold text-white"
       >Papelera</button>
{{--agregamos los componentes---}}
@livewire('create-cursos')
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
            
        </tbody>
    </table>
    
</div>

   </div>
</div>