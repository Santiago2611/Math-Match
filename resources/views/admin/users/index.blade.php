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
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function confirmDelete(e) {
      e.preventDefault();
      Swal.fire({
        title: '¿Está seguro?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí'
      }).then((result) => {
        if (result.value) {
          // Al confirmar que se desea eliminar
          deleteRequest();
        }
      })
    }
    </script>
@stop

