@extends('adminlte::page')

@section('title','Estudiantes')

@section('content_header')
    <h1>Lista de clases</h1>
@stop

@section('content')
@if (session('info'))
        <div class = "alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif
    <div class="card">
        <div class="card-header">
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Grado</th>
                        <th>Tipo clase</th>
                        <th>Fecha de vigencia</th>
                        <th>Fecha de creación</th>
                        <th>Docente</th>
                        <th colspan="2"></th>
                    </tr>
                    <tbody>
                        @foreach ($classrooms as $classroom )
                            <tr>
                                <td>{{$classroom->id}}</td>
                                <td>{{$classroom->nombre_clase}}</td>
                                <td>{{$classroom->grado}}</td>
                                <td>{{$classroom->tipo_clase}}</td>
                                <td>{{$classroom->vigente_hasta}}</td>
                                <td>{{$classroom->created_at}}</td>
                                <td>{{$classroom->teacher_id}}</td>
                                <td width="10px">
                                    <a class="btn btn-primary btn-sm" href="{{route('admin.classrooms.edit',$classroom)}}">Editar</a>
                                </td>
                                <td width="10px">
                                    <form action="{{route('admin.classrooms.destroy',$classroom)}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </thead>

            </table>
        </div>
    </div>
@stop

