@extends('adminlte::page')

@section('title','Estudiantes')

@section('content_header')
    <h1>Crear clase</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.classrooms.store'])!!}
            <div class="form-groud">
                {!! Form::label('name', 'nombre') !!}
                {!! Form::text('name', null,['class' => 'form-control','placeholder' => 'Ingrese el nombre de la clase']) !!}
            </div>
            <div class="form-groud">
                {!! Form::label('slug', 'Slug') !!}
                {!! Form::text('slug', null,['class' => 'form-control','placeholder' => 'Ingrese el slug de la clase']) !!}
            </div>

            {!!Form::close()!!}
        </div>
    </div>
@stop

