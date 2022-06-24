@extends('adminlte::page')

@section('title','Estudiantes')

@section('content_header')
    <h1>Crear docente</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.classrooms.store'])!!}
            <div class="form-groud">
                {!! Form::label('name', 'Nombre') !!}
                {!! Form::text('name', null,['class' => 'form-control','placeholder' => 'Ingrese el nombre del docente']) !!}
            </div>
            <div class="form-groud">
                {!! Form::label('slug', 'Slug') !!}
                {!! Form::text('slug', null,['class' => 'form-control','placeholder' => 'Ingrese el slug del docente']) !!}
            </div>

            {!! Form::submit('Crear docente', ['class' => 'btn btn-primary']) !!}
            {!!Form::close()!!}
        </div>
    </div>
@stop

