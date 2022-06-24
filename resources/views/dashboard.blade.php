<x-app-layout>
<<<<<<< HEAD
    <div class="container py-6 text-center">
    <p>¡Bienvenido!, Tienes las siguientes opciones:</p>
    @can('admin.home')
    <p>Ir al <a href="{{route('admin.home')}}">panel de administrador</a> </p>
    @endcan
    <p>Observar las <a href="{{route('class.show')}}"> clases disponibles</a></p>
    @can('teacher.classrooms.create')
    <p>Crear <a href="{{route('teacher.classrooms.create')}}"> una clase</a></p>
    @endcan
=======
    
>>>>>>> 537fbd146f137e67a015530c9b511e7959ea791e
</x-app-layout>
