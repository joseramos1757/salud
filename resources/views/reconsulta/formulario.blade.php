<x-app-layout>


    <div class="container mx-auto mt-6">
        <div class="lg:w-1/2 sm:w-full  px-6 py-4 rounded-lg bg-white">
            <div class="font-bold text-2 text-center text-3xl mt-1 ">REGISTRAR CONSULTA</div>
            <div class="w-full px-6 py-4 rounded-lg bg-white mb-0 ">

                <!-- Formulario -->
                <div class="font-bold text-2 text-center text-lg ">DATOS DEL PACIENTE</div>
                <br>
                <h2><span class="font-bold ">CARNET DE IDENTIDAD:</span> {{ $paciente->ci }}</h2>
                <h2><span class="font-bold">NOMBRE(S) Y APELLIDOS:</span> {{ $paciente->nombre }}
                    {{ $paciente->paterno }} {{ $paciente->materno }}</h2>
                <h2><span class="font-bold">EDAD:</span> {{ $paciente->edad }} años</h2>
                <h2><span class="font-bold">DIRECCION:</span> {{ $paciente->direccion }}</h2>
                <h2><span class="font-bold">ULTIMA CONSULTA:</span> {{ $paciente->updated_at }}</h2>
                <br>

                <form action="{{ route('reconsulta.guardar', $paciente) }}" method="post">
                    @csrf

                    <!-- Campos del formulario -->
                    <div class="w-full px-6 py-4 rounded-lg bg-white mb-0">
                        <label class="font-bold" for="especialidad">SELECCIONE LA ESPECIALIDAD:</label>
                        <select name="especialidad" id="especialidad">
                            @foreach ($especialidades as $especialidad)
                                <option value="{{ $especialidad->id }}">{{ $especialidad->nombre }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="w-full px-6 py-4 rounded-lg bg-white mb-0">
                        <label class="font-bold" for="medico">SELECCIONE EL MÉDICO:</label>
                        <select name="medico" id="medico" disabled>
                            <!-- Opciones de médicos se cargarán dinámicamente con JavaScript -->
                        </select>
                    </div>

                    <button type="submit">Guardar Reconsulta</button>
                </form>
            </div>
        </div>
    </div>

    </div>
    <!-- Agrega esto al final de tu vista, después del formulario -->
    <!-- Agrega esto al final de tu vista, después del formulario -->


</x-app-layout>
