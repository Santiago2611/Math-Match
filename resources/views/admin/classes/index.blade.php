@extends('adminlte::page')

@section('title','Estudiantes')
@section('css')
@endsection

@section('content_header')
    <h1>Lista de clases</h1>
@stop

@section('content')
@livewireScripts()

@livewire('admin.classroom-index')

@stop
@section('js')
<script type="text/javascript">
    $(document).ready(function() {
        $(window).load(function() {
            $(".cargando").fadeOut(1000);
        });
$('.mi_checkbox').change(function() {
    //Verifico el estado del checkbox, si esta seleccionado sera igual a 1 de lo contrario sera igual a 0
    var estatus = $(this).prop('checked') == true ? 1 : 0;
    var id = $(this).data('id');
        console.log(estatus);
    $.ajax({
        type: "GET",
        dataType: "json",
        //url: '/StatusNoticia',
        url: '{{ route('update.status') }}',
        data: {'estatus': estatus, 'id': id},
        success: function(data){
            $('#resp' + id).html(data.var);
            console.log(data.var)

        }
    });
})

});
</script>
@endsection

