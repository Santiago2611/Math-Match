@extends('adminlte::page')
<<<<<<< HEAD

@section('title','Estudiantes')

@section('content_header')
    <h1>Administrador estudiantes</h1>
@stop

@section('content')
    <div class = "card">
        <div class = "card-header">
            <h1 class="card-title">Estudiantes</h1>
        </div>
        <div class="card-body">
            <p>Bienvenido al panel de administrador del estudiante</p>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">

@stop

@section('js')
    <script>console.log("Hi!");</script>

@stop

=======
@section('title','Admin')
@section('content_header')
<h1>Administrador estudiantes</h1>
@endsection
@section('content')
<div class="card"
    <div class="card-header">
    <h1 class="card-title">Este es el panel de administrador de estudiantes</h1>
    </div>
    <div class="card-body">
        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Unde assumenda odio inventore cupiditate hic provident, incidunt blanditiis excepturi obcaecati ab dicta iste tempore dolorem nisi earum vitae a explicabo. Iusto?</p>
    </div>
</div>
@endsection
@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@endsection
@section('js')
    <script>console.log('Hi')</script>
@endsection
>>>>>>> c20b317f72774bac88002a5f255224b717042850
