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
                        <option value="t">Todos</option>
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
                                Estado
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
                                        <button type="button" wire:click="$toggle('aceptar')"  class="bg-gray-200 p-3 rounded hover:bg-red-500">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                                 class="fill-current text-black">
                                                <path d="M10 15.586L6.707 12.293 5.293 13.707 10 18.414 19.707 8.707 18.293 7.293z"></path>
                                            </svg>
                                        </button>
                                        <button type="button" wire:click="$toggle('rechazar')"  class="bg-gray-200 p-3 rounded hover:bg-red-500">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                                 class="fill-current text-black">
                                                <path d="M16.192 6.344L11.949 10.586 7.707 6.344 6.293 7.758 10.535 12 6.293 16.242 7.707 17.656 11.949 13.414 16.192 17.656 17.606 16.242 13.364 12 17.606 7.758z"></path>
                                            </svg>
                                        </button>

                                        <button type="button" wire:click="$toggle('ver')"  class="bg-gray-200 p-3 rounded hover:bg-gray-500">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                                 class="fill-current text-black">
                                                <path d="M12,5c-7.633,0-9.927,6.617-9.948,6.684L1.946,12l0.105,0.316C2.073,12.383,4.367,19,12,19s9.927-6.617,9.948-6.684 L22.054,12l-0.105-0.316C21.927,11.617,19.633,5,12,5z M12,16c-2.206,0-4-1.794-4-4s1.794-4,4-4s4,1.794,4,4S14.206,16,12,16z"></path><path d="M12,10c-1.084,0-2,0.916-2,2s0.916,2,2,2s2-0.916,2-2S13.084,10,12,10z">
                                                </path></svg>
                                        </button>

                                        <x-jet-dialog-modal id:="$trabajador['id']" wire:model="aceptar">
                                            <x-slot name="title">
                                                Aceptar Trabajador
                                            </x-slot>

                                            <x-slot name="content">
                                                ¿Está seguro de aceptar a este trabajador?
                                            </x-slot>

                                            <x-slot name="footer">
                                                <x-jet-secondary-button wire:click="$toggle('aceptar')">
                                                    Cancelar
                                                </x-jet-secondary-button>

                                                <x-jet-danger-button class="ml-2" wire:click="aceptar({{ $trabajador['id'] }})">
                                                    Aceptar
                                                </x-jet-danger-button>
                                            </x-slot>
                                        </x-jet-dialog-modal>

                                        <x-jet-dialog-modal id:="$trabajador['id']" wire:model="rechazar">
                                            <x-slot name="title">
                                                Rechazar Trabajador
                                            </x-slot>

                                            <x-slot name="content">
                                                ¿Está seguro de rechazar a este trabajador?
                                            </x-slot>

                                            <x-slot name="footer">
                                                <x-jet-secondary-button wire:click="$toggle('rechazar')">
                                                    Cancelar
                                                </x-jet-secondary-button>

                                                <x-jet-danger-button class="ml-2" wire:click="rechazar({{ $trabajador['id'] }})">
                                                    Rechazar
                                                </x-jet-danger-button>
                                            </x-slot>
                                        </x-jet-dialog-modal>

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

