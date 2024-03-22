<!-- Main modal -->
<div id="crud-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-7xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Create New Product
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="crud-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form wire:submit="crearPaciente" class="bg-white px-8 pt-6 pb-8 mb-4">
                <!-- Aquí van los campos del formulario -->
                @csrf
                <div class="mb-4">
                    <div class="grid grid-flow-row sm:grid-flow-col gap-3 ">
                        <div class="sm:col-span-4 justify-center">
                            <label for="ci" class="block text-sm font-semibold text-gray-600">CARNET DE IDENTIDAD:</label>
                            <input type="text" id="ci" class="w-full mt-1 p-2 border rounded-md" required wire:model="ci">
                            @error('ci')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
    
                        <div class="sm:col-span-4 justify-center">
                            <label for="nombre" class="block text-sm font-semibold text-gray-600">NOMBRE(S):</label>
                            <input type="text" id="nombre" class="w-full mt-1 p-2 border rounded-md uppercase-input" required wire:model="nombre">
                        </div>
    
                        <div class="sm:col-span-4 justify-center">
                            <label for="paterno" class="block text-sm font-semibold text-gray-600">APELLIDO PATERNO:</label>
                            <input type="text" id="paterno" class="w-full mt-1 p-2 border rounded-md uppercase-input" required wire:model="paterno">
                        </div>
    
                        <div class="sm:col-span-4 justify-center">
                            <label for="materno" class="block text-sm font-semibold text-gray-600">APELLIDO MATERNO:</label>
                            <input type="text" id="materno" class="w-full mt-1 p-2 border rounded-md uppercase-input" wire:model="materno">
                        </div>
    
                        <div class="sm:col-span-4 justify-center">
                            <label for="celular" class="block text-sm font-semibold text-gray-600">CELULAR:</label>
                            <input type="text" id="celular" class="w-full mt-1 p-2 border rounded-md" required wire:model="celular">
                            @error('celular')
                                <span class="text-red-700">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
    
                    <div class="mb-4">
                        <div class="grid grid-flow-row sm:grid-flow-col gap-3">
                            <div class="sm:col-span-8 justify-center">
                                <label for="direccion" class="block text-sm font-semibold text-gray-600">DIRECCIÓN:</label>
                                <input type="text" id="direccion" class="w-full mt-1 p-2 border rounded-md uppercase-input" required wire:model="direccion">
                            </div>
    
                            <div class="sm:col-span-4 justify-center">
                                <label for="estadocivil" class="block text-sm font-semibold text-gray-600">ESTADO CIVIL:</label>
                                <select id="estadocivil" class="w-full mt-1 p-2 border rounded-md" required wire:model="estadocivil">
                                    <option value="">SELECCIONE UNA OPCIÓN</option>
                                    <option value="SOLTERO">SOLTERO (A)</option>
                                    <option value="CASADO">CASADO (A)</option>
                                    <option value="DIVORCIADO">DIVORCIADO (A)</option>
                                    <option value="VIUDO">VIUDO (A)</option>
                                </select>
                            </div>
    
                            <div class="mb-3">
                                <label class="block text-sm font-semibold text-gray-600">SEXO:</label>
                                <div class="mt-1">
                                    <label class="inline-flex items-center">
                                        <input type="radio" class="form-radio" value="MASCULINO" required wire:model="sexo">
                                        <span class="ml-1 text-sm">MASCULINO</span>
                                    </label>
                                    <label class="inline-flex items-center ml-6">
                                        <input type="radio" class="form-radio" value="FEMENINO" required wire:model="sexo">
                                        <span class="ml-1 text-sm">FEMENINO</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
    
                    <div class="mb-4">
                        <div class="grid grid-flow-row sm:grid-flow-col gap-3">
                            <div class="sm:col-span-4 justify-center">
                                <label for="fechanac" class="block text-sm font-semibold text-gray-600">FECHA DE NACIMIENTO:</label>
                                <input type="date" id="fechanac" class="w-full mt-1 p-2 border rounded-md" required wire:model="fechanac">
                            </div>
    
                            <div class="sm:col-span-4 justify-center">
                                <label for="ocupacion" class="block text-sm font-semibold text-gray-600">OCUPACIÓN:</label>
                                <input type="text" id="ocupacion" class="w-full mt-1 p-2 border rounded-md uppercase-input" required wire:model="ocupacion">
                            </div>
    
                            <div class="sm:col-span-8 justify-center">
                                <label for="observaciones" class="block text-sm font-semibold text-gray-600">OBSERVACIONES:</label>
                                <input type="text" id="observaciones" class="w-full mt-1 p-2 border rounded-md uppercase-input" wire:model="observaciones">
                            </div>
                        </div>
                    </div>
    
                    <div class="flex items-center mt-8">
                        <button type="submit" class="bg-blue-700 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">REGISTRAR PACIENTE</button>
                    </div>
    
                </div>
    
            </form>
        </div>
    </div>
</div> 