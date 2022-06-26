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
                        <th>Estado</th>
                        <th colspan="2" >Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>
                        <form action="{{route('update.status.user')}}" method="post">
                        @csrf
                        @method('put')
                            <input type="hidden" name="id" value="{{$user->id}}">
                            <input type="hidden" name="status" value="{{$user->status}}">
                        @if($user->status == true)
                            <button class="jsgrid-button btn btn-success" type="submit">Activa <i class="fas fa-check"></i></button>
                        @else
                            <button class="jsgrid-button btn btn-danger" type="submit">Inactiva <i class="fas fa-times"></i></button>
                        @endif
                        </form>
                    </td>
                    <td width="10px">
                        <a class="btn btn-primary" href="{{route('admin.users.edit',$user)}}">Editar</a>

                    </td>
                    <td width="10px">
                        <form action="{{route('admin.users.destroy',$user)}}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
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
