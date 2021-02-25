<div>
    <div class="container antialiased font-sans mx-auto px-4 sm:px-8">
        <div class="py-8">
            <div>
                <h2 class="text-2xl font-semibold leading-tight">Usuarios</h2>
            </div>
            <div class="relative flex justify-center">
                <x-buscador wire:model="nombre">
                </x-buscador >
            </div>
            <div class="flex justify-center my-5">
                <div class="flex flex-col">
                    <x-jet-label for="cantidad" class="text-black text-base text-center" value="{{ __('Estado') }}" />
                    <select wire:model="estado" type="int"
                            id="cantidad"
                            class="appearance-none h-full rounded border block appearance-none w-full bg-white border-gray-400 text-gray-700 py-2 px-4 pr-8 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                        <option value="{{''}}">Todos</option>
                        <option value="a">Aceptados</option>
                        <option value="r">Rechazados</option>
                        <option value="p">Pendiente</option>
                    </select>
                </div>
            </div>
            <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">

                <div class="inline-block min-w-full shadow rounded-lg border-gray-800 border-2 overflow-hidden">
                    <table class="min-w-full leading-normal">
                        <thead>
                        <tr>
                            <th
                                class="px-5 py-3 border-b-2 border-gray-800 bg-gray-600 text-center text-xs  text-white uppercase">
                                Nombre de usuario
                            </th>
                            <th
                                class="px-5 py-3 border-b-2 border-gray-800 bg-gray-600 text-center text-xs  text-white uppercase">
                                Correo
                            </th>
                            <th
                                class="px-5 py-3 border-b-2 border-gray-800 bg-gray-600  text-center text-xs  text-white uppercase">
                                C.I.
                            </th>
                            <th
                                class="px-5 py-3 border-b-2 border-gray-800 bg-gray-600  text-center text-xs  text-white uppercase">
                                Habilitado
                            </th>
                            <th
                                class="px-5 py-3 border-b-2 border-gray-800 bg-gray-600  text-center text-xs  text-white uppercase">
                                Acciones
                            </th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($response->json() as $trabajador)
                            <tr>
                                <td class="px-5 py-5 border-b border-gray-800 bg-white text-sm">
                                    <p class="text-gray-900 text-center whitespace-no-wrap">{{ $trabajador['nombre'] }}</p>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-800 bg-white text-sm">
                                    <p class="text-gray-900 text-center whitespace-no-wrap">{{ $trabajador['email'] }}</p>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-800 bg-white text-sm">
                                    <p class="text-gray-900 text-center whitespace-no-wrap">{{ $trabajador['ci'] }}</p>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-800 bg-white text-sm">
                                    <div class="flex justify-center">
                                    @if($trabajador['habilitado']=='p')
                                        <span class="mr-2 bg-yellow-500 rounded-full px-3 py-2">Pendiente</span>
                                    @endif
                                        @if($trabajador['habilitado']=='a')
                                            <span class="mr-2 bg-blue-500 rounded-full px-3 py-2">Aceptado</span>
                                        @endif
                                        @if($trabajador['habilitado']=='r')
                                            <span class="mr-2 bg-red-500 rounded-full px-3 py-2">Rechazado</span>
                                        @endif
                                    </div>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-800 bg-white text-sm">
                                    <div class="flex items-center justify-center">
                                        <x-jet-button wire:click="aceptar({{ $trabajador['id'] }})">Aceptar</x-jet-button>
                                        <x-jet-button wire:click="rechazar({{ $trabajador['id'] }})">Rechazar</x-jet-button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>


                </div>
            </div>
        </div>
    </div>
</div>

