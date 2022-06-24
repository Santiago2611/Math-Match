@extends('adminlte::page')

@section('title','Estudiantes')

@section('content_header')
    <h1>Lista de clases</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
        <a class="btn btn-primary btn-sm" href="{{route('admin.teachers.create')}}">Agregar docente</a>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Apellido</th>
                        <th>Email</th>
                        <th>Fecha de Nacimiento</th>
                        <th>Fecha de creación</th>
                        <th colspan="2"></th>
                    </tr>
                    <tbody>
                        @foreach ($teachers as $teacher )
                            <tr>
                                <td>{{$teacher->id}}</td>
                                <td>{{$teacher->name}}</td>
                                <td>{{$teacher->last}}</td>
                                <td>{{$teacher->email}}</td>
                                <td>{{$teacher->birth}}</td>
                                <td>{{$teacher->created_at}}</td>
                                <td width="10px">
                                    <a class="btn btn-primary btn-sm" href="{{route('admin.teachers.edit',$teacher)}}">Editar</a>
                                </td>
                                <td width="10px">
                                    <form action="{{route('admin.teachers.destroy',$teacher)}}" method="post">
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

