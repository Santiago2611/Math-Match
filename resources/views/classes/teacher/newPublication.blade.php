<x-app-layout>
    
    <div class="container">
        <h1 class="text-center">Publicar en la clase</h1>
        <div class="card-body">
            {!! Form::open(['route' => 'classroom.publication.save'])!!}
            {!! Form::hidden('user_id', auth()->user()->id) !!}
            {!! Form::hidden('classroom_id', $classId) !!}
            <div class="form-groud">
                {!! Form::label('mensaje_publicacion', 'Mensaje') !!}
                {!! Form::text('mensaje_publicacion', null,['class' => 'form-control mb-2','placeholder' => 'Mensaje que quieres publicar', 'required']) !!}
            @error('mensaje_publicacion')
                <span class="text-danger">{{$message}}</span>
            @enderror
            </div>
            <div class="form-groud">
                {!! Form::label('archivo_adjunto', 'Adjuntar un archivo (opcional)') !!}<br>
                {!! Form::file('archivo_adjunto', null,['class' => 'form-control']) !!}
                @error('archivo_adjunto')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="form-groud">
                {!! Form::submit('Crear publicación', ['class' => 'btn btn-primary mt-2']) !!}
            </div>
            {!!Form::close()!!}
        </div>
    </div>
</x-app-layout>