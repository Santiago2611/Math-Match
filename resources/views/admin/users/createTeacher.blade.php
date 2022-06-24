@extends('adminlte::page')

@section('title','Estudiantes')

@section('content_header')
    <h1>Crear nuevo docente</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open( ['route'=>['admin.users.store'], 'method' => 'post']) !!}
            <div class="form-groud">
                {!! Form::label('name', 'Nombre') !!}
                {!! Form::text('name', null,['class' => 'form-control','placeholder' => 'Ingrese el nombre del docente']) !!}
                @error('name')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="form-groud">
                {!! Form::label('last', 'Apellido') !!}
                {!! Form::text('last', null,['class' => 'form-control','placeholder' => 'Ingrese el/los apellido(s) del docente']) !!}
                @error('last')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="form-groud">
                {!! Form::label('email', 'Correo electrónico') !!}
                {!! Form::text('email', null,['class' => 'form-control','placeholder' => 'Ingrese el email del docente']) !!}
                @error('email')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="form-groud">
                {!! Form::label('birth', 'Ingrese la fecha de nacimiento del docente') !!}
                {!! Form::date('birth', null,['class'=> 'form-control']) !!}
                @error('birth')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
                {!! Form::hidden('password', bcrypt('12345678')) !!}
                {!! Form::submit('Registrar docente', ['class' => 'btn btn-primary mt-2']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">

@stop

@section('js')
    <script>console.log("Hi!");</script>

@stop

