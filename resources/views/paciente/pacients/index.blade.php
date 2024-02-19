<x-app-layout>

  <div class="container mx-auto mt-6">
    <div class="w-full px-6 py-4 rounded-lg bg-white">
      <div class="font-bold text-2 text-center text-3xl mt-2 ">PACIENTES REGISTRADOS</div>
      <div class="w-full px-6 py-4 rounded-lg bg-white mb-0 ">
        <a href="{{route('paciente.pacients.create')}}" class="inline-block bg-green-700 px-4 py-2 rounded-md items-center">
          <button class="text-white text-center">REGISTRAR PACIENTE NUEVO</button></a>
    </div>
    <div class="w-full px-6 py-4 rounded-lg bg-white mb-6">
      <form action="{{ route('paciente.pacients.index') }}" method="GET" class="">
        <input type="text" name="carnet" placeholder="BUSCAR POR CARNET DE IDENTIDAD" class="px-4 py-2 border rounded-md w-80">
        <button type="submit" class="ml-2 inline-block bg-sky-700 px-4 py-2 rounded-md items-center">
          <span class="text-white">BUSCAR PACIENTE</span>
        </button>
      </form>
    </div>
    @if(isset($message))
    <div class="text-red-500">{{ $message }}</div> 
  </div>


@else
<table class="min-w-full">
  <thead>
    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
      <th class="py-2 px-4">CARNET</th>
      <th class="py-2 px-4">NOMBRE(S)</th>
      <th class="py-2 px-4">APELLIDO PATERNO</th>
      <th class="py-2 px-4">APELLIDO MATERNO</th>
      <th class="py-2 px-4">SEXO</th>
      <th class="py-2 px-4">CELULAR</th>
      <th class="py-2 px-4">EDAD</th>
      <th class="py-2 px-4" colspan="2">OPERACIONES</th>
      <!-- Agrega más columnas según sea necesario -->
    </tr>
  </thead>
  <tbody>
    @foreach($pacient as $paciente)
    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
      <td class="py-2 px-4 border-b">{{$paciente->ci}}</td>
      <td class="py-2 px-4 border-b">{{$paciente->nombre}}</td>
      <td class="py-2 px-4 border-b">{{$paciente->paterno}}</td>
      <td class="py-2 px-4 border-b">{{$paciente->materno}}</td>
      <td class="py-2 px-4 border-b">{{$paciente->sexo}}</td>
      <td class="py-2 px-4 border-b">{{$paciente->celular}}</td>
      <td class="py-2 px-4 border-b">{{$paciente->edad}}</td>
      <td>
        <a href="{{ route('paciente.pacients.edit', $paciente) }}" class="inline-block bg-blue-500 px-4 py-2 rounded-md h-6  flex items-center">
          <button class="text-white">EDITAR</button></a>
      </td>
 
      <td>
        <a href="{{ route('paciente.pacients.edit', $paciente) }}" class="inline-block bg-green-500 px-4 py-2 rounded-md h-6  flex items-center">
          <button class="text-white">RECONSULTA</button></a>
      </td>
      <!-- Agrega más celdas según sea necesario -->
    </tr>
    @endforeach

    <!-- Agrega más filas según sea necesario -->
  </tbody>
</table>
@endif
     
    </div>

  </div>
  <?php
echo "La zona horaria actual es: " . date_default_timezone_get();
echo "<br>";
echo "La fecha y hora actual es: " . date('Y-m-d H:i:s');
?>  

</x-app-layout>
