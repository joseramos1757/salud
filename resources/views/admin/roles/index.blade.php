
@extends('adminlte::page')
@section('title', 'Dashboard')


@section('content_header')
    <h1>ROLES DE LOS USUARIOS</h1>
@stop

@section('content')

<div class="card">
    <div class="card-header">
        <a href="{{route('admin.roles.create')}}" class="btn btn-primary">AGREGAR ROLES</a>
    </div>
</div>


@stop