<x-app-layout>
    <form method="GET" action="{{route('search.class','name')}}">
    <div class="flex justify-center">
        <div class="mb-3 xl:w-96">
          <div class="input-group relative flex flex-wrap items-stretch w-full mb-4">
            <input type="search" class="form-control relative flex-auto min-w-0 block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" placeholder="Search" aria-label="Search" aria-describedby="button-addon2">
            <button class="btn inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700  focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out flex items-center" type="button" id="button-addon2">
              <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="search" class="w-4" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                <path fill="currentColor" d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z"></path>
              </svg>
            </button>
          </div>
        </div>
      </div>
    </form>
<<<<<<< HEAD
    @foreach ($images as $image)
    <div class="container py-8">
        <div class="grid grid-cols-3 gap-6">
            <div class="card-header">
            <article class="w-full h-80 bg-cover bg-center" style="background-image: url({{$image->url_images}}) ">
            </div>
                <div class="card-body w-full h-full px-8 flex flex-col justify-center">
                    <h1 class=" text-4x1 text-black leading-8 font-bold text-center">
                        {{$image->nombre_clase}}
                    </h1>
                    <p style="color: gray">{{$image->descripcion_clase}}</p>
                    <p>Docente: <b>nombre del docente</b></p>

                    <form action="{{route('see.class', $image->id)}}" method="get">
                        @if (App\Http\Controllers\ClassroomController::getIfAlreadyInClass($image->id))
=======
    <a class="btn btn-primary btn-sm" href="{{route('teacher.classrooms.create')}}">Agregar clase</a>
    @foreach ($classrooms as $class)
    <div class="container py-8 border border-1">
        <div class="grid grid-cols-3 gap-6">
            <div class="card-header">
            <article class="w-full h-80 bg-cover bg-center" style="background-image: url({{$class->url_images}}) ">
            </div>
                <div class="card-body w-full h-full px-8 flex flex-col justify-center">
                    <h1 class=" text-4x1 text-black leading-8 font-bold text-center">
                        {{$class->nombre_clase." (".$class->tipo_clase.")"}}
                    </h1>
                    <p style="color: gray">{{$class->descripcion_clase}}</p>
                    <p>Docente: <b>nombre del docente</b></p>

                    <form action="{{route('see.class', $class->id)}}" method="get">
                        @if (App\Http\Controllers\ClassroomController::getIfAlreadyInClass($class->id))
>>>>>>> 537fbd146f137e67a015530c9b511e7959ea791e
                            <button class="btn btn-primary" type="submit">Ir a la clase</button>
                        @else
                            <button class="btn btn-secondary" type="submit">Ver más</button>
                        @endif
                    </form>

                </div>
            </article>

            </div>
        </div>
    </div>
    <hr>
@endforeach
<<<<<<< HEAD
<div class="card-footer">
    {{$images->links()}}
</div>
=======
>>>>>>> 537fbd146f137e67a015530c9b511e7959ea791e
</x-app-layout>

