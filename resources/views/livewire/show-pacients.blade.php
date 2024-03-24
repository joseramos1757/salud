<div>
    <x-card cardTitle="LISTA DE PACIENTES REGISTRADOS"> 
        <x-slot:cardTools>
            <a href="" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalPaciente"> REGISTRAR PACIENTE NUEVO</a>
        </x-slot:cardTools>
        <x-table>
        <x-slot:thead>
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
                <th scope="col" class="px-6 py-3" colspan="3">
                    OPCIONES
                </th>
         </x-slot>
         @foreach ($pacient as $paciente)
         <tr class="bg-white border-b dark:bg-gray-900 dark:border-black">
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
             <td>
                <a href="#" wire:click='edit({{$paciente->id}})' class="inline-block bg-green-500 text-white px-3 py-1 rounded-sm text-sm hover:bg-blue-600" title="Editar">
                    <i class="fa fa-notes-medical"></i>
                </a>
            </td>
             <td>
                <a href="#" wire:click='edit({{$paciente->id}})' class="inline-block bg-blue-500 text-white px-3 py-1 rounded-sm text-sm hover:bg-blue-600" title="Editar">
                    <i class="far fa-edit"></i>
                </a>
            </td>
            <td>
                <a wire:click="$dispatch('delete',{id: {{$paciente->id}}, eventName:'destroyPacient'})" class="inline-block bg-red-500 text-white px-3 py-1 rounded-sm text-sm hover:bg-red-600" title="Eliminar">
                    <i class="far fa-trash-alt"></i>
                </a>
            </td>
         </tr>
     @endforeach
    </x-table>
    {{$pacient->links()}}
    </x-card>


    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        @if(session('msg'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
            <span class="block sm:inline">{{ session('msg') }}</span>
        </div>
        @endif


    </div>
    <x-modal modalId="modalPaciente" modalTitle="REGISTRAR PACIENTE NUEVO">
    
     
        <form wire:submit="crearPaciente" class="bg-white px-8 pt-6 pb-8 mb-4">
            <!-- Aquí van los campos del formulario -->
            @csrf
            <div class="mb-4">
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <label for="ci" class="block text-sm font-semibold text-gray-900">CARNET DE IDENTIDAD:</label>
                        <input type="text" id="ci" name="ci" class="form-control mt-1" required wire:model="ci">
                        @error('ci')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
        
                    <div class="col-md-3 mb-3">
                        <label for="nombre" class="block text-sm font-semibold text-gray-900">NOMBRE(S):</label>
                        <input type="text" id="nombre" name="nombre" class="form-control mt-1" required wire:model="nombre">
                    </div>
        
                    <div class="col-md-3 mb-3">
                        <label for="paterno" class="block text-sm font-semibold text-gray-900">APELLIDO PATERNO:</label>
                        <input type="text" id="paterno" class="form-control mt-1" required wire:model="paterno">
                    </div>
        
                    <div class="col-md-3 mb-3">
                        <label for="materno" class="block text-sm font-semibold text-gray-900">APELLIDO MATERNO:</label>
                        <input type="text" id="materno" class="form-control mt-1" wire:model="materno">
                    </div>
        
               
                </div>

                <div class="mb-4">
                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <label class="block text-sm font-semibold text-gray-900">SEXO:</label>
                            <div>
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" value="MASCULINO" name="sexo" required wire:model="sexo">
                                    <span class="ml-1 text-sm">MASCULINO</span>
                                </label>
                                <label class="form-check-label ml-3">
                                    <input type="radio" class="form-check-input" value="FEMENINO" name="sexo" required wire:model="sexo">
                                    <span class="ml-1 text-sm">FEMENINO</span>
                                </label>
                            </div>
                        </div>                        
                        <div class="col-md-3 mb-3">
                            <label for="celular" class="block text-sm font-semibold text-gray-900">CELULAR:</label>
                            <input type="text" id="celular" class="form-control mt-1" required wire:model="celular">
                            @error('celular')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="direccion" class="block text-sm font-semibold text-gray-900">DIRECCIÓN:</label>
                            <input type="text" id="direccion" class="form-control mt-1" required wire:model="direccion">
                        </div>
        
                        <div class="col-md-3 mb-3">
                            <label for="estadocivil" class="block text-sm font-semibold text-gray-900">ESTADO CIVIL:</label>
                            <select id="estadocivil" class="form-control mt-1" required wire:model="estadocivil">
                                <option value="">SELECCIONE UNA OPCIÓN</option>
                                <option value="SOLTERO">SOLTERO (A)</option>
                                <option value="CASADO">CASADO (A)</option>
                                <option value="DIVORCIADO">DIVORCIADO (A)</option>
                                <option value="VIUDO">VIUDO (A)</option>
                            </select>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="fechanac" class="block text-sm font-semibold text-gray-900">FECHA DE NACIMIENTO:</label>
                            <input type="date" id="fechanac" class="form-control mt-1" required wire:model="fechanac">
                        </div>
        
                        <div class="col-md-3 mb-3">
                            <label for="ocupacion" class="block text-sm font-semibold text-gray-900">OCUPACIÓN:</label>
                            <input type="text" id="ocupacion" class="form-control mt-1" required wire:model="ocupacion">
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="observaciones" class="block text-sm font-semibold text-gray-900">OBSERVACIONES:</label>
                            <input type="text" id="observaciones" class="form-control mt-1" wire:model="observaciones">
                        </div>
                
                    </div>
                </div>
           
                <div class="flex items-center justify-end mt-8">
                    <button class="btn btn-success">REGISTRAR PACIENTE</button>
                </div>
                
            </div>
        </form>
        
        
        
    </x-modal>
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