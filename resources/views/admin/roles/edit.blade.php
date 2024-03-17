
@extends('adminlte::page')
@section('title', 'Dashboard')


@section('content_header')
    <h1>EDITAR ROLES</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        {!! Form::model($role,['route' => ['admin.roles.update', $role], 'method'=>'put']) !!}
        @csrf
        <div class="row mx-auto">
            <div class="form-group col-sm-12 col-md-6">
                
                {!! Form::label('name','INGRESE EL ROL') !!}
                {!! Form::text('name', null, ['class'=>'form-control','placeholder'=>'INGRESE EL ROL']) !!}
                <br>
                <ul>
                    
                    @foreach($permissions as $permission)
                    <li>
                        {!! Form::checkbox('permissions[]', $permission->id, in_array($permission->id, $role->permissions->pluck('id')->toArray()) ? true : false, ['id' => 'permission_'.$permission->id]) !!}
                        {!! Form::label('permission_'.$permission->id, $permission->name) !!}
                    </li>
                @endforeach
                    
                </ul>
                <br>
                {{ Form::submit('ACTUALIZAR ROL', ['class' => 'btn btn-primary']) }}

    
        </div>
        
        {!! Form::close() !!}
    </div>

</div>


@stop