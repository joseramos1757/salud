
@extends('adminlte::page')
@section('title', 'Dashboard')


@section('content_header')
    <h1>CREAR ROLES</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        {!! Form::open(['route' => 'admin.roles.store']) !!}
        @csrf
        <div class="row mx-auto">
            <div class="form-group col-sm-12 col-md-6">
                
                {!! Form::label('name','INGRESE EL ROL') !!}
                {!! Form::text('name', null, ['class'=>'form-control','placeholder'=>'INGRESE EL ROL']) !!}
            
                <br>
                {{ Form::submit('CREAR ROL', ['class' => 'btn btn-primary']) }}

    
        </div>
        
        {!! Form::close() !!}
    </div>

</div>


@stop