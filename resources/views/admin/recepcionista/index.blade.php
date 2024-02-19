
@extends('adminlte::page')
@section('title', 'Dashboard')


@section('content_header')
    <h1>REGISTRO DE RECEPCIONISTAS</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
        <a href="{{route('admin.receptionists.create')}}" class="btn btn-primary">REGISTRAR DE RECEPCIONISTAS</a>
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
                {{--<th class="text-sm">FECHA DE NAC</th>--}}
                <th>USUARIO</th>
                <th>CORREO ELECTRONICO</th>
                <th colspan="2">OPCIONES</th>
            </tr>

            </thead>
            <tbody>
                @foreach ($receptionist as $recepcionista)
                    <tr>
                        <td>{{$recepcionista->ci}}</td>
                        <td>{{$recepcionista->nombre}}</td>
                        <td>{{$recepcionista->paterno}}</td>
                        <td>{{$recepcionista->materno}}</td>
                        <td>{{$recepcionista->celular}}</td>

                        {{--<td>{{$administrator->fechanac}}</td>--}}
                        <td>{{$recepcionista->user->name}}</td>
                        <td>{{$recepcionista->user->email}}</td>

                        <td width="10px"><a href="{{route('admin.receptionists.edit',$recepcionista)}}" class="btn btn-primary btn-sm">EDITAR</a>
                        </td>
                        <td width="10px">
                            <form action="{{route('admin.receptionists.destroy',$recepcionista)}}" method="POST">
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
