
    
    @extends('adminlte::page')
    @section('title', 'Dashboard')


    @section('content_header')
        <h1>REGISTRAR MEDICO</h1>
    @stop

    @section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.medics.store']) !!}
            <div class="row mx-auto">
                <div class="form-group col-sm-12 col-md-6">
                    
                    {!! Form::label('ci','CARNET DE IDENTIDAD') !!}
                    {!! Form::text('ci', null, ['class'=>'form-control','placeholder'=>'INGRESE NUMERO DE CARNET','pattern' => '[0-9]+']) !!}
                    
                    @error('ci')
                        <span class="text-danger">{{$message}}</span>
                    @enderror

                </div>
                <div class="form-group col-sm-12 col-md-6">
                    {!! Form::label('nombre','NOMBRE') !!}
                    {!! Form::text('nombre', null, ['class'=>'form-control text-uppercase','placeholder'=>'Ingrese el nombre']) !!}
                    @error('nombre')
                    <span class="text-danger">{{$message}}</span>
                @enderror
                </div>
                <div class="form-group col-sm-12 col-md-6">
                    {!! Form::label('paterno','APELLIDO PATERNO') !!}
                    {!! Form::text('paterno', null, ['class'=>'form-control text-uppercase','placeholder'=>'Ingrese el apellido paterno']) !!}
                    @error('paterno')
                    <span class="text-danger">{{$message}}</span>
                @enderror
                </div>
                <div class="form-group col-sm-12 col-md-6">
                    {!! Form::label('materno','APELLIDO MATERNO') !!}
                    {!! Form::text('materno', null, ['class'=>'form-control text-uppercase','placeholder'=>'Ingrese el apellido materno']) !!}
                </div>
                <div class="form-group col-sm-12 col-md-6">
                    {!! Form::label('celular','CELULAR') !!}
                    {!! Form::text('celular', null, ['class'=>'form-control','placeholder'=>'INGRESE EL NUMERO DE CELULAR']) !!}
                    @error('celular')
                    <span class="text-danger">{{$message}}</span>
                @enderror
                </div>
                <div class="form-group col-sm-12 col-md-6">
                    {!! Form::label('fechanac','FECHA DE NACIMIENTO') !!}
                    {!! Form::date('fechanac', null, ['class'=>'form-control text-uppercase','placeholder'=>'Ingrese la fecha de nacimiento']) !!}
                    @error('fechanac')
                    <span class="text-danger">{{$message}}</span>
                @enderror
                </div> 
                <div class="form-group col-sm-12 col-md-6">
                    {{Form::label('especialidad', 'ESPECIALIDAD')}}
                    {{Form::select('especialidad', ['' => 'SELECCIONE UNA OPCIÓN', 'MEDICO GENERAL' => 'MEDICO GENERAL', 'GINECOLOGO' => 'GINECOLOGO', 'CARDIOLOGO' => 'CARDIOLOGO', 'ECOGRAFO' => 'ECOGRAFO'], null, ['class' => 'form-control'])}}
              
                  </div>
         
            <!-- Campos del usuario -->
            <div class="form-group col-sm-12 col-md-6">
                    {{ Form::label('user_id', 'NOMBRE DEL USUARIO') }}
                    {{ Form::select('user_id', $users, null, ['class' => 'form-control']) }}
                    @error('user_id')
                    <span class="text-danger">{{$message}}</span>
                    @enderror                    
                </div>
                <div class="form-group col-sm-12 col-md-12">
                    {!! Form::label('direccion','DIRECCION') !!}
                    {!! Form::text('direccion', null, ['class'=>'form-control text-uppercase','placeholder'=>'Ingrese la dirección']) !!}
                    @error('direccion')
                    <span class="text-danger">{{$message}}</span>
                @enderror
                </div>


                    {{ Form::submit('CREAR ADMINISTRADOR', ['class' => 'btn btn-primary']) }}

        
            </div>
            
            {!! Form::close() !!}
        </div>

    </div>
    @stop

