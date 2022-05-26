<x-app-layout>
    <div class="container py-8">
        <div class="grid grid-cols-3 gap-6">

            @foreach ($images as $image)
            <article class="w-full h-80 bg-cover bg-center @if($loop->first) col-span-2 @endif" style="background-image: url({{$image->url}}) ">


                <div class="w-full h-full px-8 flex flex-col justify-center">
                    @foreach ($classrooms as $classroom)
                        <h1 class="text-4x1 text-white leading-8 font-bold"><a href="">
                        {{$classroom->nombre_clase}}
                    </a></h1>

                    @endforeach
                </div>

            </article>



            @endforeach

        </div>
    </div>

</x-app-layout>

