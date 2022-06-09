@extends('adminlte::page')

@section('title','Estudiantes')

@section('content_header')
    <h1>Editar clase</h1>
@stop

@section('content')
    @if (session('info'))
        <div class = "alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif

<div class="card">
    <h1 class="text-center">Editar clase</h1>
    <div class="card-body">
        {!! Form::model($classroom,['route' => ['admin.classrooms.update',$classroom], 'method' => 'put'])!!}
        <div class="form-groud">
            {!! Form::label('nombre_clase', 'Nombre') !!}
            {!! Form::text('nombre_clase', null,['class' => 'form-control','placeholder' => 'Ingrese el nombre de la clase']) !!}
        @error('nombre_clase')
            <span class="text-danger">{{$message}}</span>
        @enderror
        </div>
        <div class="form-groud">
            {!! Form::label('descripcion_clase', 'Descripción') !!}
            {!! Form::text('descripcion_clase', null,['class' => 'form-control','placeholder' => 'Ingrese la descripción de la clase']) !!}
            @error('descripcion_clase')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="form-groud">
            {!! Form::label('tipo_clase', 'Tipo de clase') !!}
            {!! Form::select('tipo_clase', ['Privada','publica'], ['publica','privada'],['class' => 'form-control']) !!}
            @error('tipo_clase')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="form-groud">
            {!! Form::label('vigente_hasta', 'Fecha de finalización') !!}
            {!! Form::date('vigente_hasta', null,['class' => 'form-control']) !!}
            @error('vigente_hasta')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="form-groud">
            {!! Form::label('grado', 'Grado para el cual va dirigido') !!}
            {!! Form::select('grado', ['8','9','10','11'], ['8','9','10','11'],['class' => 'form-control']) !!}
            @error('grado')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="form-groud">
            {!! Form::label('slug', 'Slug') !!}
            {!! Form::text('slug', null,['class' => 'form-control','placeholder' => 'Ingrese el slug de la clase', 'readonly']) !!}
        </div>
        <div class="form-groud">
            {!! Form::submit('Actualizar clase', ['class' => 'btn btn-primary']) !!}
        </div>
        {!!Form::close()!!}
    </div>
</div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">

@stop

@section('js')
<script src="{{asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.StringToSlug.min.js')}}"></script>
<script>
    $(document).ready( function() {
    $("#nombre_clase").stringToSlug({
    setEvents: 'keyup keydown blur',
    getPut: '#slug',
    space: '-'
    });
    });
</script>
@stop

