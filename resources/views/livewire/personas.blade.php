<div class="p-2 sm:px-20 bg-white border-b border-gray-200"> 
    <div class="mt-4 text-2xl">
        <div class="mt-4 text-2xl flex justify-between shadow-inner">
            <div>Personas</div>
            <div class="mr-2">
                <x-jet-button class="bg-indigo-500 hover:bg-indigo-700" wire:click="confirmPersonaAdd" >
                    {{ __('Registrar') }}
                </x-jet-button>
            </div>
        </div>
        
    </div>
    <div class="mt-3">
        <div class="flex justify-between">
            <div>
                <input wire:model="buscar" type="search" placeholder="Buscar" class="shadow appearence-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline placeholder-indigo-500" name="">
            </div>
        </div>
        <table class="table-auto w-full mt-6">
            <thead>
                <tr class="bg-indigo-500 text-white">
                    <th class="px-4 py-2">
                        <div class="flex items-center">ID</div>
                    </th>
                    <th class="px-4 py-2">
                        <div class="flex items-center">Código</div>
                    </th>
                    <th class="px-4 py-2">
                        <div class="flex items-center">Nombre</div>
                    </th>
                    <th class="px-4 py-2">
                        <div class="flex items-center">Apellido</div>
                    </th>
                    <th class="px-4 py-2">
                        <div class="flex items-center">Cedula</div>
                    </th>                    
                    <th class="px-4 py-2">
                        <div class="flex items-center">Nro Teléfono</div>
                    </th>                    
                    <th class="px-4 py-2">
                        <div class="flex items-center">Acción</div>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($personas as $persona)
                    <tr>
                        <td class="rounded border px-4 py-2">{{$persona->id}}</td>
                        <td class="rounded border px-4 py-2">{{$persona->idusuario}}</td>
                        <td class="rounded border px-4 py-2">{{$persona->nombre}}</td>
                        <td class="rounded border px-4 py-2">{{$persona->apellido}}</td>
                        <td class="rounded border px-4 py-2">{{$persona->cedula}}</td>
                        <td class="rounded border px-4 py-2">{{$persona->nrotelefono}}</td>                        
                        <td class="rounded border px-4 py-2">
                            <x-jet-button class="bg-green-500 hover:bg-green-700" wire:click="confirmPersonaVer({{$persona->id}})" >
                                {{ __('Ver') }}
                            </x-jet-button>
                            <x-jet-button class="bg-indigo-500 hover:bg-indigo-700" wire:click="confirmPersonaEditar({{$persona->id}})" >
                                {{ __('Editar') }}
                            </x-jet-button>
                            <x-jet-danger-button wire:click="confirmPersonaDeletion ({{$persona->id}})" wire:loading.attr="disabled">
                                {{ __('Eliminar') }}
                            </x-jet-danger-button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="mt-4">
        {{$personas->links()}}
    </div>
    <!-- Delete Persona Confirmation Modal -->
    <x-jet-dialog-modal wire:model="confirmingPersonaDeletion">
            <x-slot name="title">
                {{ __('Eliminar Registro ') }}
            </x-slot>

            <x-slot name="content">
                {{ __('¿Esta seguro de que desea eliminar el registro?.') }}   
            </x-slot>

            <x-slot name="footer">
                <x-jet-secondary-button wire:click="$toggle('confirmingPersonaDeletion', false)" wire:loading.attr="disabled">
                    {{ __('Cancelar') }}
                </x-jet-secondary-button>

                <x-jet-danger-button class="ml-3" wire:click="deletePersona ({{ $confirmingPersonaDeletion }})" wire:loading.attr="disabled">
                    {{ __('Borrar Registro') }}
                </x-jet-danger-button>
            </x-slot>
        </x-jet-dialog-modal>

        <!-- Agregar Persona Confirmation Modal -->
    <x-jet-dialog-modal wire:model="confirmingPersonaAdd">
            <x-slot name="title">
                {{ isset( $this->persona->id) ? 'Editar' : 'Registrar' }}
            </x-slot>

            <x-slot name="content">                
                <div class="grid grid-cols-4 gap-4 text-sm text-gray-600">
                    <div class="col-span-4 sm:col-span-2">
                        <x-jet-label for="name" value="{{ __('Nombre') }}" />
                        <x-jet-input id="persona.nombre" type="text" class="mt-1 block w-full" wire:model.defer="persona.nombre"/>
                        <x-jet-input-error for="persona.nombre" class="mt-2" />
                    </div>
                    <div class="col-span-4 sm:col-span-2">
                        <x-jet-label for="apellido" value="{{ __('Apellido') }}" />
                        <x-jet-input id="persona.apellido" type="text" class="mt-1 block w-full" wire:model.defer="persona.apellido"/>
                        <x-jet-input-error for="persona.apellido" class="mt-2" />
                    </div>                    
                    <div class="col-span-4 sm:col-span-2">
                        <x-jet-label for="cedula" value="{{ __('Cedula') }}" />
                        <x-jet-input id="persona.cedula" name="persona.cedula" type="text" class="mt-1 block w-full" wire:model.defer="persona.cedula"/>
                        <x-jet-input-error for="persona.cedula" class="mt-2" />
                    </div>
                    <div class="col-span-4 sm:col-span-2">
                        <x-jet-label for="pasaporte" value="{{ __('Pasaporte') }}" />
                        <x-jet-input id="persona.pasaporte" type="text" class="mt-1 block w-full" wire:model.defer="persona.pasaporte"/>
                        <x-jet-input-error for="persona.pasaporte" class="mt-2" />
                    </div>
                    <div class="col-span-4 sm:col-span-2">
                        <x-jet-label for="fnacimiento" value="{{ __('Fecha de Nacimiento') }}" />
                        <x-jet-input id="persona.fnacimiento" type="date" class="mt-1 block w-full" wire:model.defer="persona.fnacimiento" />
                        <x-jet-input-error for="persona.fnacimiento" class="mt-2" />
                    </div>
                    <div class="col-span-4 sm:col-span-2">
                        <x-jet-label for="ntelefono" value="{{ __('Numero de Teléfono ') }}" />
                        <x-jet-input id="persona.nrotelefono" type="text" class="mt-1 block w-full" wire:model.defer="persona.nrotelefono"/>
                        <x-jet-input-error for="persona.nrotelefono" class="mt-2" />
                    </div>
                    <div class="col-span-4 sm:col-span-2">
                        <x-jet-label for="email" value="{{ __('Correo electrónico') }}" />
                        <x-jet-input id="persona.email" type="email" class="mt-1 block w-full" wire:model.defer="persona.email" />
                        <x-jet-input-error for="persona.email" class="mt-2" />
                    </div>
                    <div class="col-span-4 sm:col-span-4">
                        <x-jet-label for="direccion" value="{{ __('Dirección') }}" />
                        <x-jet-input id="persona.direccion" type="text" class="mt-1 block w-full" wire:model.defer="persona.direccion"/>
                        <x-jet-input-error for="persona.direccion" class="mt-2" />
                    </div>
                    <div class="col-span-4 sm:col-span-4">
                        <x-jet-label for="direccion" value="{{ __('Destino') }}" />
                        <x-jet-input id="persona.destinovuela" type="text" class="mt-1 block w-full" wire:model.defer="persona.destinovuela"/>
                        <x-jet-input-error for="persona.destinovuela" class="mt-2" />
                    </div>
                    <div class="col-span-4 sm:col-span-2">
                        <x-jet-label for="fvuelo" value="{{ __('Fecha del Viaje') }}" />
                        <x-jet-input id="persona.fvuelo" type="date" class="mt-1 block w-full" wire:model.defer="persona.fvuelo" />
                        <x-jet-input-error for="persona.fvuelo" class="mt-2" />
                    </div>
                    <div class="col-span-4 sm:col-span-2">
                        <x-jet-label for="numerodevuelo" value="{{ __('Numero del Vuelo') }}" />
                        <x-jet-input id="persona.numerodevuelo" type="text" class="mt-1 block w-full" wire:model.defer="persona.numerodevuelo"/>
                        <x-jet-input-error for="persona.numerodevuelo" class="mt-2" />
                    </div>
                </div>
            </x-slot>

            <x-slot name="footer">
                <x-jet-secondary-button wire:click="$toggle('confirmingPersonaAdd', false)" wire:loading.attr="disabled">
                    {{ __('Cancelar') }}
                </x-jet-secondary-button>
                <x-jet-danger-button class="ml-3" wire:click="savePersona()" wire:loading.attr="disabled">
                    {{ __('Guardar') }}
                </x-jet-danger-button>
            </x-slot>
        </x-jet-dialog-modal>

        <!-- Agregar Persona Confirmation Modal -->
    <x-jet-dialog-modal wire:model="confirmingPersonaVer">
            <x-slot name="title">
                {{ __('Ver') }}
            </x-slot>

            <x-slot name="content">                
                <div class="grid grid-cols-4 gap-4 text-sm text-gray-600">
                    <div class="col-span-4 sm:col-span-2">
                        <x-jet-label for="name" value="{{ __('Nombre') }}" />
                        <x-jet-input id="persona.nombre" type="text" class="mt-1 block w-full" wire:model.defer="persona.nombre" disabled/>
                        <x-jet-input-error for="persona.nombre" class="mt-2" />
                    </div>
                    <div class="col-span-4 sm:col-span-2">
                        <x-jet-label for="apellido" value="{{ __('Apellido') }}" />
                        <x-jet-input id="persona.apellido" type="text" class="mt-1 block w-full" wire:model.defer="persona.apellido" disabled/>
                        <x-jet-input-error for="persona.apellido" class="mt-2" />
                    </div>                    
                    <div class="col-span-4 sm:col-span-2">
                        <x-jet-label for="cedula" value="{{ __('Cedula') }}" />
                        <x-jet-input id="persona.cedula" type="text" class="mt-1 block w-full" wire:model.defer="persona.cedula" disabled/>
                        <x-jet-input-error for="persona.cedula" class="mt-2" />
                    </div>
                    <div class="col-span-4 sm:col-span-2">
                        <x-jet-label for="pasaporte" value="{{ __('Pasaporte') }}" />
                        <x-jet-input id="persona.pasaporte" type="text" class="mt-1 block w-full" wire:model.defer="persona.pasaporte" disabled/>
                        <x-jet-input-error for="persona.pasaporte" class="mt-2" />
                    </div>
                    <div class="col-span-4 sm:col-span-2">
                        <x-jet-label for="fnacimiento" value="{{ __('Fecha de Nacimiento') }}" />
                        <x-jet-input id="persona.fnacimiento" type="date" class="mt-1 block w-full" wire:model.defer="persona.fnacimiento"  disabled/>
                        <x-jet-input-error for="persona.fnacimiento" class="mt-2" />
                    </div>
                    <div class="col-span-4 sm:col-span-2">
                        <x-jet-label for="ntelefono" value="{{ __('Numero de Teléfono ') }}" />
                        <x-jet-input id="persona.nrotelefono" type="text" class="mt-1 block w-full" wire:model.defer="persona.nrotelefono" disabled/>
                        <x-jet-input-error for="persona.nrotelefono" class="mt-2" />
                    </div>
                    <div class="col-span-4 sm:col-span-2">
                        <x-jet-label for="email" value="{{ __('Correo electrónico') }}" />
                        <x-jet-input id="persona.email" type="email" class="mt-1 block w-full" wire:model.defer="persona.email"  disabled/>
                        <x-jet-input-error for="persona.email" class="mt-2" />
                    </div>
                    <div class="col-span-4 sm:col-span-2">
                        <x-jet-label for="codigo" value="{{ __('Código') }}" />
                        <x-jet-input id="persona.idusuario" type="text" class="mt-1 block w-full" wire:model.defer="persona.idusuario" disabled/>
                        <x-jet-input-error for="persona.idusuario" class="mt-2" />
                    </div>
                    <div class="col-span-4 sm:col-span-4">
                        <x-jet-label for="direccion" value="{{ __('Dirección') }}" />
                        <x-jet-input id="persona.direccion" type="text" class="mt-1 block w-full" wire:model.defer="persona.direccion" disabled/>
                        <x-jet-input-error for="persona.direccion" class="mt-2" />
                    </div>
                    <div class="col-span-4 sm:col-span-4">
                        <x-jet-label for="direccion" value="{{ __('Destino') }}" />
                        <x-jet-input id="persona.destinovuela" type="text" class="mt-1 block w-full" wire:model.defer="persona.destinovuela" disabled/>
                        <x-jet-input-error for="persona.destinovuela" class="mt-2" />
                    </div>
                    <div class="col-span-4 sm:col-span-2">
                        <x-jet-label for="fvuelo" value="{{ __('Fecha del Viaje') }}" />
                        <x-jet-input id="persona.fvuelo" type="date" class="mt-1 block w-full" wire:model.defer="persona.fvuelo" disabled/>
                        <x-jet-input-error for="persona.fvuelo" class="mt-2" />
                    </div>
                    <div class="col-span-4 sm:col-span-2">
                        <x-jet-label for="numerodevuelo" value="{{ __('Numero del Vuelo') }}" />
                        <x-jet-input id="persona.numerodevuelo" type="text" class="mt-1 block w-full" wire:model.defer="persona.numerodevuelo" disabled/>
                        <x-jet-input-error for="persona.numerodevuelo" class="mt-2" />
                    </div>
                </div>
            </x-slot>

            <x-slot name="footer">
                <x-jet-secondary-button wire:click="$toggle('confirmingPersonaVer', false)" wire:loading.attr="disabled">
                    {{ __('Cerrar') }}
                </x-jet-secondary-button>
            </x-slot>
        </x-jet-dialog-modal>
</div>