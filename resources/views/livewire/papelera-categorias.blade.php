<div>
    {{-- In work, do what you enjoy. --}}
    <x-dialog-modal wire:model="openModalPapelera">
        <x-slot:title>Categorías en papelera</x-slot:title>
        <x-slot:content>
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-3">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-white uppercase bg-orange-400 hover:bg-orange-700 dark:bg-gray-700 dark:text-gray-400">
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
                                <x-button class="bg-yellow-300 hover:bg-yellow-400">editar</x-button>
                                <x-danger-button >eliminar</x-danger-button>
                            </td>
                        </tr>
                        @empty
                            <td colspan="3">
                                <span class="px-3 py-4 text-red-600">No hay categorías para mostrar....</span>
                            </td>
                        @endforelse 
                    </tbody>
                </table>
                 
            </div>
        </x-slot:content>

        <x-slot name="footer"></x-slot>
    </x-dialog-modal>
</div>
