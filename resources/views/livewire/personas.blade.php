<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Personas') }}
    </h2>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">         
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">

            @if (session()->has('message'))
                <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3" role="alert">
                  <div class="flex">
                    <div>
                      <p class="text-sm">{{ session('message') }}</p>
                    </div>
                  </div>
                </div>
            @endif

            <div class="py-2">
                <button wire:click="crear()" class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded my-3">
                    Nuevo
                </button>
            </div>

            @if($modal)
                @include('livewire.crear')
            @endif

            <table class="table-fixed w-full">
                <thead>
                    <tr class="bg-indigo-600 text-white">
                        <th class="px-4 py-2">ID</th>
                        <th class="px-4 py-2">Código</th>
                        <th class="px-4 py-2">Nombres</th>
                        <th class="px-4 py-2">Apellidos</th>
                        <th class="px-4 py-2">Cedula</th>
                        <th class="px-4 py-2">Teléfono</th>
                        <th class="px-4 py-2">Actividad</th>                        
                    </tr>
                </thead>
                <tbody>
                    @foreach($personas as $persona)
                        <tr>
                            <td class="border px-4 py-2">{{$persona->id}}</td>
                            <td class="border px-4 py-2">{{$persona->idusuario}}</td>
                            <td class="border px-4 py-2">{{$persona->nombre}}</td>
                            <td class="border px-4 py-2">{{$persona->apellido}}</td>
                            <td class="border px-4 py-2">{{$persona->nac}}-{{$persona->cedula}}</td>
                            <td class="border px-4 py-2">{{$persona->nrotelefono}}</td>
                            <td class="border px-4 py-2">
                                <button wire:click="edit({{$persona->id }})" class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded my-3">
                                    Ver
                                </button>
                                <button wire:click="edit({{$persona->id }})" class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded my-3">
                                    Editar
                                </button>
                                <button wire:click="delete({{$persona->id }})" class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded my-3">
                                    Eliminar
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>    
</div>

