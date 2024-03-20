<div>
   <h1>hola mundo </h1>
   <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <h1>{{$title}}({{$pacientCount}})</h1>
        {{$search}}
     
        @if(session('msg'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
            <span class="block sm:inline">{{ session('msg') }}</span>
        </div>
        @endif

        <br>
        <input wire:model.live="search" type="text">
     <br>
        <!-- Formulario -->

        <div class="container ml-auto mr-auto flex mt-6">
            <div class="w-full md:w-full">
        
                <!-- Formulario -->
        
                <form wire:submit="crearPaciente" class="bg-white px-8 pt-6 pb-8 mb-4">
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
        
                    </div>
        
                </form>
        
            </div>
        </div>
    
        <div class="px-6 py-4">
            <input type="text" wire:model="search">

            <table class="w-full text-sm text-left rtl:text-right text-gray-900 dark:text-gray-900">
                <thead
                    class="text-xs text-gray-900 uppercase bg-gray-50 dark:bg-gray-900 dark:text-gray-600">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            CARNET
                        </th>
                        <th scope="col" class="px-6 py-3">
                            NOMBRE(S)
                        </th>
                        <th scope="col" class="px-6 py-3">
                            APELLIDO PATERNO
                        </th>
                        <th scope="col" class="px-6 py-3">
                            APELLIDO MATERNO
                        </th>
                        <th scope="col" class="px-6 py-3">
                            SEXO
                        </th>
                        <th scope="col" class="px-6 py-3">
                            CELULAR
                        </th>
                        <th scope="col" class="px-6 py-3">
                            EDAD
                        </th>
                        <th scope="col" class="px-6 py-3 col-span-2">
                            OPCIONES
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pacient as $paciente)
                        <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                            <td class="px-6 py-4">
                                {{ $paciente->ci }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $paciente->nombre }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $paciente->paterno }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $paciente->materno }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $paciente->sexo }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $paciente->celular }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $paciente->edad }}
                            </td>
                            <td class="px-6 py-4">
                                <a href="#"
                                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                            </td>
                            <td class="px-6 py-4">
                                <a href="#"
                                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>