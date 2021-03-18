<div>
    <div class="container antialiased font-sans mx-auto px-4 sm:px-8">
        <div class="py-8">
            <div>
                <h2 class="text-2xl font-semibold leading-tight">Solicitudes</h2>
            </div>
            <div class="flex justify-center my-5">
                <div class="flex flex-col">
                    <x-jet-label for="cantidad" class="text-black text-base text-center" value="{{ __('Estado') }}"/>
                    <select wire:model="estado" type="int"
                            id="cantidad"
                            class="appearance-none h-full rounded border block appearance-none w-full bg-white border-gray-400 text-gray-700 py-2 px-4 pr-8 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                        <option value="t">Todas</option>
                        <option value="a">Aceptadas</option>
                        <option value="r">Rechazadas</option>
                        <option value="p">Pendientes</option>
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
                                Servicio
                            </th>
                            <th
                                class="px-5 py-3 border-b-2 border-gray-800 bg-gray-600 text-center text-xs  text-white uppercase">
                                Descripción
                            </th>
                            <th
                                class="px-5 py-3 border-b-2 border-gray-800 bg-gray-600  text-center text-xs  text-white uppercase">
                                Estado
                            </th>
                            <th
                                class="px-5 py-3 border-b-2 border-gray-800 bg-gray-600  text-center text-xs  text-white uppercase">
                                Costo
                            </th>
                            <th
                                class="px-5 py-3 border-b-2 border-gray-800 bg-gray-600  text-center text-xs  text-white uppercase">
                                Ubicación
                            </th>
                            <th
                                class="px-5 py-3 border-b-2 border-gray-800 bg-gray-600  text-center text-xs  text-white uppercase">
                                Acciones
                            </th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($solicitudes as $solicitud)
                            <tr>
                                <td class="px-5 py-5 border-b border-gray-800 bg-white text-sm">
                                    <p class="text-gray-900 text-center whitespace-no-wrap">{{ $solicitud['nombre'] }}</p>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-800 bg-white text-sm">
                                    <p class="text-gray-900 text-center whitespace-no-wrap">{{ $solicitud['descripcion'] }}</p>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-800 bg-white text-sm">
                                    <div class="flex justify-center">
                                        @if(mb_substr($solicitud['estado'],0,1)=='p')
                                            <span class="mr-2 bg-yellow-500 rounded-full px-3 py-2">Pendiente</span>
                                        @endif
                                        @if(mb_substr($solicitud['estado'],0,1)=='a')
                                            <span class="mr-2 bg-blue-500 rounded-full px-3 py-2">Aceptada</span>
                                        @endif
                                        @if(mb_substr($solicitud['estado'],0,1)=='r')
                                            <span class="mr-2 bg-red-500 rounded-full px-3 py-2">Rechazada</span>
                                        @endif
                                    </div>
                                </td>

                                <td class="px-5 py-5 border-b border-gray-800 bg-white text-sm">
                                    <p class="text-gray-900 text-center whitespace-no-wrap">{{ $solicitud['costo']==null?'No definido':$solicitud['costo'] }}</p>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-800 bg-white text-sm">
                                    <a href="{{ 'https://www.google.com/maps/?q='.$solicitud['latitud'].','.$solicitud['longitud'] }}" target="_blank"
                                       class="inline-flex items-center text-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">Ver ubicación
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                             style="fill:rgb(255,255,255);transform:;-ms-filter:">
                                            <path d="M12,2C7.589,2,4,5.589,4,9.995C3.971,16.44,11.696,21.784,12,22c0,0,8.029-5.56,8-12C20,5.589,16.411,2,12,2z M12,14 c-2.21,0-4-1.79-4-4s1.79-4,4-4s4,1.79,4,4S14.21,14,12,14z">

                                            </path></svg>
                                    </a>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-800 bg-white text-sm">
                                    <button type="button" wire:click="obtenerSolicitud({{$solicitud['solicitud_id']}})"
                                            class="bg-gray-200 p-3 rounded hover:bg-gray-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                             viewBox="0 0 24 24"
                                             class="fill-current text-black">
                                            <path
                                                d="M12,5c-7.633,0-9.927,6.617-9.948,6.684L1.946,12l0.105,0.316C2.073,12.383,4.367,19,12,19s9.927-6.617,9.948-6.684 L22.054,12l-0.105-0.316C21.927,11.617,19.633,5,12,5z M12,16c-2.206,0-4-1.794-4-4s1.794-4,4-4s4,1.794,4,4S14.206,16,12,16z"></path>
                                            <path
                                                d="M12,10c-1.084,0-2,0.916-2,2s0.916,2,2,2s2-0.916,2-2S13.084,10,12,10z">
                                            </path>
                                        </svg>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                    <x-jet-dialog-modal wire:model="ver">
                        <x-slot name="title">
                            Detalles
                        </x-slot>

                        <x-slot name="content">
                            @if($solicitudActual!=null)
                                <div class="flex-row justify-center text-center">
                                    <div class="flex justify-center">
                                    <span class="mr-2 bg-blue-500 rounded-full px-3 py-2 text-white">{{$solicitudActual['nombre']}}</span>
                                    </div>
                                    <p>Descripcion: {{$solicitudActual['descripcion']}}</p>
                                    <p>Empleador: {{$solicitudActual['empleador']['nombre']}}</p>
                                    <p>Trabjador: {{$solicitudActual['trabajador']['nombre']}}</p>
                                </div>
                            @endif
                        </x-slot>

                        <x-slot name="footer">
                            <x-jet-secondary-button wire:click="$toggle('ver')">
                                Aceptar
                            </x-jet-secondary-button>
                        </x-slot>
                    </x-jet-dialog-modal>
                </div>
            </div>
        </div>
    </div>
</div>
