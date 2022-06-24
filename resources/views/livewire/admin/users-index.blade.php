<div>
    <div class="card">
        @if (session('info'))
        <div class = "alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif
        <div class="card-header">
            <input wire:model="search" class="form-control" placeholder="Ingrese el nombre o correo de un usuario">
        </div>
        @if ($users->count())
           <div class="card-body">
            <table class="table table-stripped">
                <a href="{{route('admin.users.create')}}" class="btn btn-primary btn-sm">Agregar un docente</a>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td width="10px">
                        <a class="btn btn-primary" href="{{route('admin.users.edit',$user)}}">Editar</a>
                    </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{$users->links()}}
        </div>
        @else

            <div class="card-body">
                <strong>No hay registros</strong>
            </div>

        @endif

    </div>

</div>
