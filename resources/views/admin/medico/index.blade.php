
@extends('adminlte::page')
@section('title', 'Dashboard')


@section('content_header')
    <h1>REGISTRO DE MEDICOS 2</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
        <a href="{{route('admin.medics.create')}}" class="btn btn-primary">REGISTRAR MEDICO</a>
    </div>
<div class="card-body">
    <table class="table table-striped table-responsive">
        <thead class="text-center">
            <tr>
                <th>CI</th>
                <th>NOMBRE</th>
                <th>PATERNO</th>
                <th>MATERNO</th>
                <th>CELULAR</th>
                <th>ESPECIALIDAD</th>
           
                {{--<th class="text-sm">FECHA DE NAC</th>--}}
                <th>USUARIO</th>
                <th>CORREO ELECTRONICO</th>
                <th colspan="2">OPCIONES</th>
            </tr>

            </thead>
            <tbody>
                @foreach ($medic as $medico)
                    <tr>
                        <td>{{$medico->ci}}</td>
                        <td>{{$medico->nombre}}</td>
                        <td>{{$medico->paterno}}</td>
                        <td>{{$medico->materno}}</td>
                        <td>{{$medico->celular}}</td>
                        @if($medico->especialidads->isNotEmpty())
                        <td>{{$medico->especialidads->first()->nombre}}</td>
                    @else
                        <td>N/A</td>
                    @endif
                        {{--<td>{{$administrator->fechanac}}</td>--}}
                        <td>{{$medico->user->name}}</td>
                        <td>{{$medico->user->email}}</td>

                        <td width="10px"><a href="{{route('admin.medics.edit',$medico)}}" class="btn btn-primary btn-sm">EDITAR</a>
                        </td>
                        <td width="10px">
                            <form action="{{route('admin.medics.destroy',$medico)}}" method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger btn-sm">ELIMINAR</button>
                            </form>
                        </td>
                    </tr>
            @endforeach
        </tbody>

    </table>

</div>
</div>
@stop
