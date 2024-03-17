
@extends('adminlte::page')
@section('title', 'Dashboard')


@section('content_header')
    <h1>REGISTRO DE USUARIOS</h1>
@stop

@section('content')

@section('content')
<div class="card">
    <div class="card-body">
        {!! Form::open(['route' => 'admin.users.store']) !!}
        @csrf
        <div class="row mx-auto">
            <div class="form-group col-sm-12 col-md-6">
                
                {!! Form::label('name','NOMBRE DEL USUARIO') !!}
                {!! Form::text('name', null, ['class'=>'form-control']) !!}

                {!! Form::label('email','EMAIL') !!}
                {!! Form::email('email', null, ['class'=>'form-control']) !!}

                {!! Form::label('password','CONTRASEÑA') !!}
                {!! Form::text('password', null, ['class'=>'form-control']) !!}
                
                {!! Form::label('password-confirmation','CONFIRMAR CONTRASEÑA') !!}
                {!! Form::text('password-confirmation', null, ['class'=>'form-control']) !!}
                {!! Form::label('roles','SELECCIONE EL ROL DEL USUARUIO:') !!}
                <br>
                <ul>
                    
                    @foreach($roles as $rol)
                    <li>
                        {!! Form::checkbox('roles[]', $rol->id, false, ['id' => 'roles_'.$rol->id]) !!}
                        {!! Form::label('roles_'.$rol->id, $rol->name) !!}
                    </li>
                @endforeach
                
                </ul>
            
                <br>
                {{ Form::submit('REGISTRAR USUARIO', ['class' => 'btn btn-primary']) }}

    
        </div>
        
        {!! Form::close() !!}
    </div>

</div>


@stop
@stop
