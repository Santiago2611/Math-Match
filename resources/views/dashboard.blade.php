<x-app-layout>
    <div class="container py-6 text-center">
    <p>¡Bienvenido!, Tienes las siguientes opciones:</p>

    @can('admin.home')
    <p>Ir al <a href="{{route('admin.home')}}">panel de administrador</a> </p>
    @endcan
    
    @can('join.class')
        <p>Observar las <a href="{{route('class.show')}}"> clases disponibles</a></p>
        <p>Ver <a href="{{route('student.seeClasses')}}">tus clases</a></p>
    @endcan

    @can('teacher.classrooms.create')
        <p>Crear <a href="{{route('teacher.classrooms.create')}}"> una clase</a></p>
        <p>Ver <a href="{{route('teacher.classrooms.index')}}">tus clases</a></p>
    @endcan
</x-app-layout>
