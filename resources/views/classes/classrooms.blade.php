<x-app-layout>
    @php

    @endphp
    <div class="container py-8">
        <div class="grid grid-cols-3 gap-6">

            @foreach ($images as $image)

            <article class="w-full h-80 bg-cover bg-center @if($loop->first) col-span-2 @endif" style="background-image: url({{$image->url}}) ">


                <div class="w-full h-full px-8 flex flex-col justify-center">
                        <h1 class="text-4x1 text-white leading-8 font-bold"><a href="">
                        {{$image->nombre_c}}

                    </a></h1>
                        <button class="btn btn-primary" value="Unirse">Unirse</button>
                </div>

            </article>

            @endforeach
        </div>
    </div>

</x-app-layout>

