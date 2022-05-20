<x-app-layout>
    <div class="container">
        <div class="grid grid-cols-3 gap-6">

            @foreach ($classrooms as $classroom)
            <article>
                {{$classroom->images}}
            </article>

            @endforeach

        </div>
    </div>

</x-app-layout>
