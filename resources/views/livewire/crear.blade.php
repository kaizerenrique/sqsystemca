<div class="bg-slate-800 bg-opacity-50 flex justify-center items-center absolute top-0 right-0 bottom-0 left-0 ">
  <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0 max-w-7xl mx-auto sm:px-6 lg:px-8">

    <div class="fixed inset-0 transition-opacity">
      <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
    </div> 

    <!-- This element is to trick the browser into centering the modal contents. -->

    <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>  

    <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-7xl sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">

      <form class="w-full max-w-lg">
        <div class="bg-white px-8 pt-5 pb-4 sm:p-6 sm:pb-4 sm:flex sm:flex-row-reverse">

          <div class="flex flex-wrap -mx-3 mb-6">

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
              <div>
                <div>
                  <label for="" class="block uppercase tracking-wide text-gray-700 text-xs font-bold">Nombre</label>
                  <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded" id="nombre" wire:model="nombre" type="text">
                </div>
              </div>
              <div>
                <div>
                  <label for="" class="block uppercase tracking-wide text-gray-700 text-xs font-bold">Apellido</label>
                  <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded" id="apellido" wire:model="apellido" type="text">
                </div>
              </div>
              <div>
                <div>
                  <label for="" class="block uppercase tracking-wide text-gray-700 text-xs font-bold">Cedula</label>
                  <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded" id="cedula" wire:model="cedula" type="text">
                </div>
              </div>
            </div>            
          </div>
          

        </div>

        <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">

          <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">

            <button wire:click="cerrarModal()" type="button" class="bg-indigo-500 px-4 py-2 rounded-md text-md text-white">
              Guardar
            </button>

          </span>

          <span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto">           

            <button wire:click="cerrarModal()" type="button" class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-white text-base leading-6 font-medium text-gray-700 shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">
              Cancel
            </button>

          </span>
        </form>
      </div>
    </div>
  </div>
</div>
