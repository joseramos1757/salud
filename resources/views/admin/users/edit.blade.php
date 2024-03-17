
@extends('adminlte::page')
@section('title', 'Dashboard')


@section('content_header')
    <h1>edit DE LOS USUARIOS</h1>
@stop

@section('content')

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

                {!! Form::label('password','CONTRASEÑA') !!}
                {!! Form::text('password', null, ['class'=>'form-control']) !!}
                
                {!! Form::label('password-confirmation','CONFIRMAR CONTRASEÑA') !!}
                {!! Form::text('password-confirmation', null, ['class'=>'form-control']) !!}
                
                
            
                <br>
                {{ Form::submit('ACTUALIZAR USUARIO', ['class' => 'btn btn-primary']) }}

    
        </div>
        
        {!! Form::close() !!}
    </div>

</div>


@stop
@stop
