
@extends('adminlte::page')
@section('title', 'Dashboard')


@section('content_header')
    <h1>EDITAR ROLES</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        {!! Form::model($permission,['route' => ['admin.permissions.update', $permission], 'method'=>'put']) !!}
        @csrf
        <div class="row mx-auto">
            <div class="form-group col-sm-12 col-md-6">
                
                {!! Form::label('name','INGRESE DEL PERMISO') !!}
                {!! Form::text('name', null, ['class'=>'form-control','placeholder'=>'INGRESE EL PERMISO']) !!}
                
            
                <br>
                {{ Form::submit('ACTUALIZAR PERMISO', ['class' => 'btn btn-primary']) }}

    
        </div>
        
        {!! Form::close() !!}
    </div>

</div>


@stop