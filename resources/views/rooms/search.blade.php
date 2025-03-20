@forelse ($users as $user)
    <div class="card card-hover" style="width: 18rem; display: inline-block; margin: 10px;">
        <img src="{{ $user->photo }}" class="card-img-top" alt="Foto de {{ $user->name }}">
        <div class="card-body">
            <h5 class="card-title">{{ $user->name }} {{ $user->lastname }}</h5>
            <p class="card-text">
                <strong>Documento:</strong> {{ $user->document }} <br>
                <strong>Dirección:</strong> {{ $user->address }} <br>
                <strong>Teléfono:</strong> {{ $user->phone }} <br>
                <strong>Email:</strong> {{ $user->email }} <br>
                <strong>Rol:</strong> {{ $user->role }} <br>
                <button type="button" class="btn btn-primary btn-user btn-block edit" data-bs-toggle="modal"
                    data-bs-target="#exampleEdit" id='{{ $user->id }}'>Editar </button>
                <button data-bs-toggle="modal" data-bs-target="#exampleDelete"
                    class="btn btn-primary btn-user btn-block delete" id='{{ $user->id }}'>Eliminar </button>

            <form action="{{ url('users/' . $user->id) }}">
                @csrf
                @method('DELETE')
            </form>


            </p>


        </div>
    </div>
    @empty
    No encontro registros para el criterio de busqueda
@endforelse
