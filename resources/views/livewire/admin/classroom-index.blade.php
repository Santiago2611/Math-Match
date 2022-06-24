<div>
    @if (session('info'))
    <div class = "alert alert-success">
        <strong>{{session('info')}}</strong>
    </div>
@endif
<div class="card">
    <div class="card-header">
        <input wire:model="search" class="form-control" placeholder="Ingrese el nombre de la clase">
    </div>
    @if ($classrooms->count())
    <div class="card-body">
        <table class="table table-striped" id="clases">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Grado</th>
                    <th>Tipo clase</th>
                    <th>Fecha de vigencia</th>
                    <th>Fecha de creación</th>
                    <th>Docente</th>
                    <th>Estado</th>
                    <th colspan="2">Acciones</th>
                </tr>
                <tbody>
                    @foreach ($classrooms as $classroom )
                        <tr>
                            <td>{{$classroom->id}}</td>
                            <td>{{$classroom->nombre_clase}}</td>
                            <td>{{$classroom->grado}}</td>
                            <td>{{$classroom->tipo_clase}}</td>
                            <td>{{$classroom->vigente_hasta}}</td>
                            <td>{{$classroom->created_at}}</td>
                            <td>{{$classroom->teacher_id}}</td>
                            <td id="resp{{ $classroom->id }}">
                                @if($classroom->status == 1)
                                    <a class="btn btn-success">Activa <i class="fas fa-check"></i></a>
                                @else
                                    <a class="btn btn-danger">Inactiva <i class="fas fa-times"></i></a>
                                @endif
                            </td>
                            <td width="10px">
                                <a class="btn btn-primary btn-sm" href="{{route('admin.classrooms.edit',$classroom)}}">Editar</a>
                            </td>
                            <td width="10px">
                                <label class="switch">
                                    <input data-id="{{ $classroom->id }}" class="mi_checkbox" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="InActive" {{ $classroom->status ? 'checked' : '' }}>
                                    <span class="slider round"></span>
                                </label>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </thead>

        </table>
    </div>
    <div class="card-footer">
        {{$classrooms->links()}}
    </div>
    @else

            <div class="card-body">
                <strong>No hay registros</strong>
            </div>

        @endif
</div>

</div>
