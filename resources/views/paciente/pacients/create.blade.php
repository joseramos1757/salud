<x-app-layout>


    <div class="container ml-auto mr-auto flex mt-6 ">
        <div class="w-full md:w-full">

            <!-- Formulario -->

            <form wire:submit.prevent="createUser" class="bg-white px-8 pt-6 pb-8 mb-4">
                <!-- Aquí van los campos del formulario -->
           
              @csrf
            <div class="mb-4">
                <div class="mt-2 mb-6 font-semibold text-3xl text-gray-800 leading-tight w-full justify-center">
                    <center>
                        <h1>FORMULARIO DE REGISTRO DE PACIENTES</h1>
                    </center>
                </div>

                <div class="grid grid-flow-row sm:grid-flow-col gap-3 ">
                    <div class="sm:col-span-4 justify-center">
                        <label for="ci" class="block text-sm font-semibold text-gray-600">CARNET DE IDENTIDAD:</label>
                        <input type="text" id="ci" class="w-full mt-1 p-2 border rounded-md" required wire:model.lazy="ci">
                        @error('ci')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                
                    <div class="sm:col-span-4 justify-center">
                        <label for="nombre" class="block text-sm font-semibold text-gray-600">NOMBRE(S):</label>
                        <input type="text" id="nombre" class="w-full mt-1 p-2 border rounded-md uppercase-input" required wire:model.lazy="nombre">
                    </div>
                
                    <div class="sm:col-span-4 justify-center">
                        <label for="paterno" class="block text-sm font-semibold text-gray-600">APELLIDO PATERNO:</label>
                        <input type="text" id="paterno" class="w-full mt-1 p-2 border rounded-md uppercase-input" required wire:model.lazy="paterno">
                    </div>
                
                    <div class="sm:col-span-4 justify-center">
                        <label for="materno" class="block text-sm font-semibold text-gray-600">APELLIDO MATERNO:</label>
                        <input type="text" id="materno" class="w-full mt-1 p-2 border rounded-md uppercase-input" wire:model.lazy="materno">
                    </div>
                
                    <div class="sm:col-span-4 justify-center">
                        <label for="celular" class="block text-sm font-semibold text-gray-600">CELULAR:</label>
                        <input type="text" id="celular" class="w-full mt-1 p-2 border rounded-md" required wire:model.lazy="celular">
                        @error('celular')
                            <span class="text-red-700">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                
                <div class="mb-4">
                    <div class="grid grid-flow-row sm:grid-flow-col gap-3">
                        <div class="sm:col-span-8 justify-center">
                            <label for="direccion" class="block text-sm font-semibold text-gray-600">DIRECCIÓN:</label>
                            <input type="text" id="direccion" class="w-full mt-1 p-2 border rounded-md uppercase-input" required wire:model.lazy="direccion">
                        </div>
                
                        <div class="sm:col-span-4 justify-center">
                            <label for="estadocivil" class="block text-sm font-semibold text-gray-600">ESTADO CIVIL:</label>
                            <select id="estadocivil" class="w-full mt-1 p-2 border rounded-md" required wire:model.lazy="estadocivil">
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
                                    <input type="radio" class="form-radio" value="MASCULINO" required wire:model.lazy="sexo">
                                    <span class="ml-1 text-sm">MASCULINO</span>
                                </label>
                                <label class="inline-flex items-center ml-6">
                                    <input type="radio" class="form-radio" value="FEMENINO" required wire:model.lazy="sexo">
                                    <span class="ml-1 text-sm">FEMENINO</span>
                                </label>
                            </div>
                        </div>
                    </div>
               
                <div class="mb-4">
                    <div class="grid grid-flow-row sm:grid-flow-col gap-3">
                        <div class="sm:col-span-4 justify-center">
                            <label for="fechanac" class="block text-sm font-semibold text-gray-600">FECHA DE NACIMIENTO:</label>
                            <input type="date" id="fechanac" class="w-full mt-1 p-2 border rounded-md" required wire:model.lazy="fechanac">
                        </div>
                
                        <div class="sm:col-span-4 justify-center">
                            <label for="ocupacion" class="block text-sm font-semibold text-gray-600">OCUPACIÓN:</label>
                            <input type="text" id="ocupacion" class="w-full mt-1 p-2 border rounded-md uppercase-input" required wire:model.lazy="ocupacion">
                        </div>
                
                        <div class="sm:col-span-8 justify-center">
                            <label for="observaciones" class="block text-sm font-semibold text-gray-600">OBSERVACIONES:</label>
                            <input type="text" id="observaciones" class="w-full mt-1 p-2 border rounded-md uppercase-input" wire:model.lazy="observaciones">
                        </div>
                    </div>
                </div>
                
                <div class="flex items-center mt-8">
                    <button type="submit" class="bg-blue-700 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">REGISTRAR PACIENTE</button>
                </div>
                
        </form>

        </div>

    </div>
    <!-- Agrega esto al final de tu vista, después del formulario -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Obtén todos los elementos de entrada de texto por su clase
            var inputElements = document.querySelectorAll('.uppercase-input');

            // Agrega un evento de escucha para cada elemento de entrada de texto
            inputElements.forEach(function(input) {
                // Escucha el evento de cambio en el campo de entrada
                input.addEventListener('input', function() {
                    // Convierte el valor a mayúsculas y actualiza el valor del campo
                    this.value = this.value.toUpperCase();
                });
            });
        });
    </script>



</x-app-layout>
