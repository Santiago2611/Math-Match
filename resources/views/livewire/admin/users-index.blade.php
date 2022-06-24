<div>
    <div class="card">
<<<<<<< HEAD
        @if (session('info'))
        <div class = "alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif
=======
>>>>>>> 537fbd146f137e67a015530c9b511e7959ea791e
        <div class="card-header">
            <input wire:model="search" class="form-control" placeholder="Ingrese el nombre o correo de un usuario">
        </div>
        @if ($users->count())
           <div class="card-body">
            <table class="table table-stripped">
<<<<<<< HEAD
                <a href="{{route('admin.users.create')}}" class="btn btn-primary btn-sm">Agregar un docente</a>
=======
>>>>>>> 537fbd146f137e67a015530c9b511e7959ea791e
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
<<<<<<< HEAD
        </div>
=======
        </div> 
>>>>>>> 537fbd146f137e67a015530c9b511e7959ea791e
        @else

            <div class="card-body">
                <strong>No hay registros</strong>
            </div>

        @endif
<<<<<<< HEAD

    </div>

=======
        
    </div>
  
>>>>>>> 537fbd146f137e67a015530c9b511e7959ea791e
</div>
