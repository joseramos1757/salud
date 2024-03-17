
@extends('adminlte::page')
@section('title', 'Dashboard')


@section('content_header')
    <h1>PERMISOS DE LOS USUARIOS</h1>
@stop

@section('content')

<div class="card">
    <div class="card-header">
        <a href="{{route('admin.permissions.create')}}" class="btn btn-primary">AGREGAR PERMISOS</a>
    </div>
</div>


        <div class="card">
          
            <div class="card-body">
                <table class="table table-striped table-responsive">
                    <thead class="text-center">
                        <tr>
                            <th>#</th> <!-- Agregamos una columna para la numeración -->
                            <th>NOMBRE</th>
                            <th colspan="2">OPCIONES</th>
                        </tr>

                        </thead>
                        <tbody>
                            @foreach ($permissions as $key=>$permission)
                                <tr>
                                    <td>{{ $key + 1 }}</td> <!-- Utilizamos la variable $key para la numeración -->
                                    <td>{{$permission->name}}</td>
                        
                                    <td width="10px"><a href="{{route('admin.permissions.edit',$permission)}}" class="btn btn-primary btn-sm">EDITAR</a>
                                    </td>
                                    <td width="10px">
                                        <form action="{{route('admin.permissions.destroy',$permission)}}" method="POST">
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
