@extends('adminlte::page')
@section('title', 'Dashboard')

@section('content_header')
    <h1>EDITAR USUARIOS</h1>
@stop

@section('content')

<div class="card">
    <div class="card-body">
        {!! Form::model($user,['route' => ['admin.users.update', $user], 'method'=>'put']) !!}
        @csrf
        <div class="row mx-auto">
            <div class="form-group col-sm-12 col-md-6">
                {!! Form::label('name','NOMBRE DEL USUARIO') !!}
                {!! Form::text('name', null, ['class'=>'form-control']) !!}

                {!! Form::label('email','EMAIL') !!}
                {!! Form::email('email', null, ['class'=>'form-control']) !!}

                {!! Form::label('roles','SELECCIONE EL ROL DEL USUARIO:') !!}
                <br>
                <ul>
                    @foreach($roles as $rol)
                        <li>
                            {!! Form::checkbox('roles[]', $rol->id, $user->hasRole($rol->name), ['id' => 'roles_'.$rol->id]) !!}
                            {!! Form::label('roles_'.$rol->id, $rol->name) !!}
                        </li>
                    @endforeach
                </ul>
            
                <br>
                {{ Form::submit('ACTUALIZAR USUARIO', ['class' => 'btn btn-primary']) }}
            </div>
        </div>
        
        {!! Form::close() !!}
    </div>
</div>

@stop
