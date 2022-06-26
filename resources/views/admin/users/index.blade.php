@extends('adminlte::page')

@section('title','Estudiantes')

@section('content_header')
    <h1>Lista de usuarios</h1>
@stop

@section('content')
@livewireScripts()
    @livewire('admin.users-index')
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">

@stop

@section('js')
    <script>console.log("Hi!");</script>

@stop

