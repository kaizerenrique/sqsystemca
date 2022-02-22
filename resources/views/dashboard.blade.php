<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
                <div class="col-span-6 sm:col-span-4">
                    <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                        <div>
                            <img class="h-16 w-16 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                        </div>

                        <div class="mt-8 text-2xl">
                            Bienvenido/a {{ Auth::user()->name }}
                        </div>
                        
                        <div class="col-span-6 sm:col-span-4">                    
                            <livewire:pasientes/>                  
                        </div>                        
                    </div>               
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
