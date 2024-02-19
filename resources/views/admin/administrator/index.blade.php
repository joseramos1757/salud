
@extends('adminlte::page')
@section('title', 'Dashboard')


@section('content_header')
    <h1>LISTA DE ADMINISTRADORES</h1>
@stop

@section('content')
        <div class="card">
                <div class="card-header">
                    <a href="{{route('admin.administrators.create')}}" class="btn btn-primary">AGREGAR ADMINISTRADOR</a>
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
                            @foreach ($administrators as $administrator)
                                <tr>
                                    <td>{{$administrator->ci}}</td>
                                    <td>{{$administrator->nombre}}</td>
                                    <td>{{$administrator->paterno}}</td>
                                    <td>{{$administrator->materno}}</td>
                                    <td>{{$administrator->celular}}</td>
                                    {{--<td>{{$administrator->fechanac}}</td>--}}
                                    <td>{{$administrator->user->name}}</td>
                                    <td>{{$administrator->user->email}}</td>

                                    <td width="10px"><a href="{{route('admin.administrators.edit',$administrator)}}" class="btn btn-primary btn-sm">EDITAR</a>
                                    </td>
                                    <td width="10px">
                                        <form action="{{route('admin.administrators.destroy',$administrator)}}" method="POST">
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
