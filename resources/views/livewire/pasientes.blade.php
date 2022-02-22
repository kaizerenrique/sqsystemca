<div class="p-2 sm:px-20 bg-white border-b border-gray-200">
    <div class="mt-4 text-2xl flex justify-between shadow-inner">
        <div>Registro</div>
        <div class="mr-2">
            <x-jet-button wire:click="confirmArticleAdd" class="bg-blue-500 hover:bg-blue-800">
                Obtener Código
            </x-jet-button>           
        </div>
    </div>

    
    <div class="mt-8 text-9xl">        
        {{$data->idusuario}}
    </div>
<x-jet-dialog-modal wire:model="confirmingArticleAdd">
    <x-slot name="title">
        {{ __('Eliminar Registro ') }}
    </x-slot>

    <x-slot name="content">                
                <div class="grid grid-cols-4 gap-4 text-sm text-gray-600">
                    <div class="col-span-4 sm:col-span-2">
                        <x-jet-label for="name" value="{{ __('Nombre') }}" />
                        <x-jet-input id="article.nombre" type="text" class="mt-1 block w-full" wire:model.defer="article.nombre"/>
                        <x-jet-input-error for="article.nombre" class="mt-2" />
                    </div>
                    <div class="col-span-4 sm:col-span-2">
                        <x-jet-label for="apellido" value="{{ __('Apellido') }}" />
                        <x-jet-input id="article.apellido" type="text" class="mt-1 block w-full" wire:model.defer="article.apellido"/>
                        <x-jet-input-error for="article.apellido" class="mt-2" />
                    </div>                    
                    <div class="col-span-4 sm:col-span-2">
                        <x-jet-label for="cedula" value="{{ __('Cedula') }}" />
                        <x-jet-input id="article.cedula" name="article.cedula" type="text" class="mt-1 block w-full" wire:model.defer="article.cedula"/>
                        <x-jet-input-error for="article.cedula" class="mt-2" />
                    </div>
                    <div class="col-span-4 sm:col-span-2">
                        <x-jet-label for="pasaporte" value="{{ __('Pasaporte') }}" />
                        <x-jet-input id="article.pasaporte" type="text" class="mt-1 block w-full" wire:model.defer="article.pasaporte"/>
                        <x-jet-input-error for="article.pasaporte" class="mt-2" />
                    </div>
                    <div class="col-span-4 sm:col-span-2">
                        <x-jet-label for="fnacimiento" value="{{ __('Fecha de Nacimiento') }}" />
                        <x-jet-input id="article.fnacimiento" type="date" class="mt-1 block w-full" wire:model.defer="article.fnacimiento" />
                        <x-jet-input-error for="article.fnacimiento" class="mt-2" />
                    </div>
                    <div class="col-span-4 sm:col-span-2">
                        <x-jet-label for="ntelefono" value="{{ __('Numero de Teléfono ') }}" />
                        <x-jet-input id="article.nrotelefono" type="text" class="mt-1 block w-full" wire:model.defer="article.nrotelefono"/>
                        <x-jet-input-error for="article.nrotelefono" class="mt-2" />
                    </div>
                    <div class="col-span-4 sm:col-span-2">
                        <x-jet-label for="email" value="{{ __('Correo electrónico') }}" />
                        <x-jet-input id="article.email" type="email" class="mt-1 block w-full" wire:model.defer="article.email" />
                        <x-jet-input-error for="article.email" class="mt-2" />
                    </div>
                    <div class="col-span-4 sm:col-span-4">
                        <x-jet-label for="direccion" value="{{ __('Dirección') }}" />
                        <x-jet-input id="article.direccion" type="text" class="mt-1 block w-full" wire:model.defer="article.direccion"/>
                        <x-jet-input-error for="article.direccion" class="mt-2" />
                    </div>
                    <div class="col-span-4 sm:col-span-4">
                        <x-jet-label for="direccion" value="{{ __('Destino') }}" />
                        <x-jet-input id="article.destinovuela" type="text" class="mt-1 block w-full" wire:model.defer="article.destinovuela"/>
                        <x-jet-input-error for="article.destinovuela" class="mt-2" />
                    </div>
                    <div class="col-span-4 sm:col-span-2">
                        <x-jet-label for="fvuelo" value="{{ __('Fecha del Viaje') }}" />
                        <x-jet-input id="article.fvuelo" type="date" class="mt-1 block w-full" wire:model.defer="article.fvuelo" />
                        <x-jet-input-error for="article.fvuelo" class="mt-2" />
                    </div>
                    <div class="col-span-4 sm:col-span-2">
                        <x-jet-label for="numerodevuelo" value="{{ __('Numero del Vuelo') }}" />
                        <x-jet-input id="article.numerodevuelo" type="text" class="mt-1 block w-full" wire:model.defer="article.numerodevuelo"/>
                        <x-jet-input-error for="article.numerodevuelo" class="mt-2" />
                    </div>
                </div>
            </x-slot>

    <x-slot name="footer">
        <x-jet-secondary-button wire:click="$toggle('confirmingArticleAdd', false)" wire:loading.attr="disabled">
            {{ __('Cancelar') }}
        </x-jet-secondary-button>

        <x-jet-danger-button class="ml-3" wire:click="saveArticle ()" wire:loading.attr="disabled">
            {{ __('Enviar') }}
        </x-jet-danger-button>
    </x-slot>
</x-jet-dialog-modal>

</div>



    
