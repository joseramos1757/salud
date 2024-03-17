
@extends('adminlte::page')
@section('title', 'Dashboard')


@section('content_header')
    <h1>PERMISOS DE LOS USUARIOS</h1>
@stop

@section('content')

<div class="card">
    <div class="card-header">
        <a href="{{route('admin.users.create')}}" class="btn btn-primary">AGREGAR PERMISOS</a>
    </div>
</div>

        <div class="card">
          
            <div class="card-body">
                <table class="table table-striped table-responsive">
                    <thead class="text-center">
                        <tr>
                            <th>#</th> <!-- Agregamos una columna para la numeración -->
                            <th>NOMBRE DE USUARIO</th>
                            <th>EMAIL</th>
                            <th colspan="2">OPCIONES</th>
                        </tr>

                        </thead>
                        <tbody>
                            @foreach ($users as $key=>$user)
                                <tr>
                                    <td>{{ $key + 1 }}</td> <!-- Utilizamos la variable $key para la numeración -->
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                        
                                    <td width="10px"><a href="{{route('admin.users.edit',$user)}}" class="btn btn-primary btn-sm">EDITAR</a>
                                    </td>
                                    <td width="10px">
                                        <form action="{{route('admin.users.destroy',$user)}}" method="POST">
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
